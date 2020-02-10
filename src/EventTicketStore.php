<?php

namespace Alexei4er\EventTicketStore;

use Dompdf\Dompdf;
use Alexei4er\EventTicketStore\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EventTicketStore
{
    /**
     * Creating bill in pdf format and saving in the local disk
     *
     * @param Order $order
     * @return string
     */
    public function makeBill(Order $order): string
    {
        $blade = view('ets_views::orders.pdf.bill', [
            'order' => $order,
            'company' => config("event-ticket-store.company"),
        ])->render();

        $output = $this->renderBill($blade);

        Storage::disk('local')->put($order->bill_path, $output);

        return $order->bill_path;
    }

    /**
     * Generate redirect to robokassa
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function makePayment(Order $order): RedirectResponse
    {
        $url = config('robokassa.url');
        $login = config('robokassa.login');
        $password = config('robokassa.password');

        $receipt = [
            'sno' => 'osn',
            'items' => [
                [
                    'name' => $order->service_name,
                    'quantity' => $order->amount,
                    'sum' => $order->sum,
                    'payment_method' => 'full_payment',
                    'payment_object' => 'service',
                    'tax' => 'vat20',
                ]
            ]
        ];
        $json = json_encode($receipt);
        $crc  = md5("{$login}:{$order->sum}:{$order->id}:{$json}:{$password}");

        $parameters = [
            'MerchantLogin' => $login,
            'OutSum' => $order->sum,
            'InvId' => $order->id,
            'Description' => $order->service_name,
            'SignatureValue' => $crc,
            'Receipt' => $json,
            'Email' => $order->email,
        ];
        $parameters = http_build_query($parameters);

        return redirect("{$url}?{$parameters}");
    }

    /**
     * Create pdf document from html
     *
     * @param string $blade
     * @return string
     */
    protected function renderBill(string $blade): string
    {
        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($blade, 'UTF-8');
        $dompdf->render();
        return $dompdf->output();
    }
}
