<?php

namespace Alexei4er\EventTicketStore;

use Dompdf\Dompdf;
use Alexei4er\EventTicketStore\Models\Order;
use Illuminate\Support\Facades\Storage;

class EventTicketStore
{
    /**
     * Creating bill in pdf format
     *
     * @param Order $order
     * @return void
     */
    public function makeBill(Order $order)
    {
        $blade = view('ets_views::orders.pdf.bill', [
            'order' => $order,
            'company' => config("event-ticket-store.company"),
        ])->render();

        $output = $this->renderBill($blade);

        Storage::disk('local')->put($order->bill_path, $output);
    }

    /**
     * Undocumented function
     *
     * @param Order $order
     * @return void
     */
    public function makePayment(Order $order)
    {
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
        $url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin={$login}&" .
            "OutSum={$order->sum}&InvId={$order->id}&Description={$order->service_name}&" .
            "SignatureValue={$crc}&Receipt={$json}&Email={$order->email}";
        return redirect($url);
    }

    protected function renderBill($blade)
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
