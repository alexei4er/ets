<?php

declare(strict_types=1);

namespace Alexei4er\EventTicketStore\Http\Controllers;

use Alexei4er\EventTicketStore\Facades\EventTicketStore;
use Alexei4er\EventTicketStore\Http\Requests\OrderRequest;
use Alexei4er\EventTicketStore\Models\Event;
use Alexei4er\EventTicketStore\Models\Order;
use Alexei4er\EventTicketStore\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TicketsController extends Controller
{
    /**
     * Tickets web page
     *
     * @param Event $event
     * @return View
     */
    public function index(Event $event): View
    {
        return view("ets_views::tickets.index", [
            "event" => $event,
        ]);
    }

    /**
     * Create order
     *
     * @param OrderRequest $request
     * @return void
     */
    public function store(OrderRequest $request)
    {
        try {
            $ticket = Ticket::findOrFail($request->input('ticket_id'));
            $order = $ticket->orders()->create($request->input());

            if ($order->customer_type == Order::ORGANIZATION_TYPE) {
                EventTicketStore::makeBill($order);
                return Storage::download($order->bill_path);
            } else {
                return EventTicketStore::makePayment($order);
            }
        } catch (\Exception $e) {
            $request->session()->flash('fail_message', $e->getMessage());
            return back()->withInput();
        }
    }


    /**
     * Handle robokassa hook
     *
     * @param Request $request
     * @return string
     */
    public function payment(Request $request): string
    {
        $outsum = $request->input('OutSum');
        $invid = $request->input('InvId');
        $pass = config('robokassa.pass2');
        $sign = mb_strtolower($request->input('SignatureValue'));
        $crc  = mb_strtolower(md5("$outsum:$invid:$pass"));
        if ($sign == $crc) {
            $order = Order::findOrFail($invid);
            $order->paid = true;
            $order->save();
            return 'OK' . $invid;
        }
    }
}
