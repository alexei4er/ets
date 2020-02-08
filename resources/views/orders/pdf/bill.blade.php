<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Заказ-соглашение № {{$order->id}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        td{
            padding:5px;
            border:1px black solid;
        }
        table{
            border-collapse: collapse;
        }
        .noborder{
            border:none;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
        }
        .font9{
            font-size: 9px;
        }
    </style>
</head>
<body>
<h3>ЗАКАЗ - СОГЛАШЕНИЕ НА ОКАЗАНИЕ УСЛУГ № {{$order->id}}</h3>
<table>
    <tr>
        <td width="110"><b>Заказчик</b></td>
        <td width="390">{{$order['company']}}</td>
    </tr>
    <tr>
        <td width="110">Адрес</td>
        <td width="390">{{$order['address']}}</td>
    </tr>
    <tr>
        <td width="110">Реквизиты</td>
        <td width="390">ИНН {{$order['inn']}}, КПП {{$order['kpp']}}, ОГРН {{$order['ogrn']}}; БИК {{$order['bik']}}, Р/с {{$order['rs']}}, К/с {{$order['ks']}}, {{$order['bank']}}</td>
    </tr>
    <tr>
        <td width="110">Телефон</td>
        <td width="390">{{$order['phone']}}</td>
    </tr>
    <tr>
        <td width="110">Контактное лицо</td>
        <td width="390">{{$order['name']}}</td>
    </tr>
</table>
<p></p>
<table>
    <tr>
        <td width="110"><b>Исполнитель</b></td>
        <td width="390">{{$company['name']}}</td>
    </tr>

    <tr>
        <td width="110">Адрес</td>
        <td width="390">{{$company['address']}}</td>
    </tr>
    <tr>
        <td width="110">Реквизиты</td>
        <td width="390">ИНН {{$company['inn']}}, КПП {{$company['kpp']}}, ОГРН {{$company['ogrn']}}; БИК {{$company['bik']}}, Р/с {{$company['rs']}}, К/с {{$company['ks']}}, {{$company['bank']}}</td>
    </tr>
    <tr>
        <td width="110">Телефон</td>
        <td width="390">{{$company['phone']}}</td>
    </tr>
</table>
<p><b><i>Условия оплаты - 100% предоплата в рублях</i></b></p>
<p>Оплата услуг производится на основании настоящего Заказа-Соглашения в течение 3 (трёх) рабочих дней с момента выставления
    (дополнительно по требованию Заказчика может быть выставлен счет).</p>
<p>Заказчик и Исполнитель подтверждают заказ нижеследующего:</p>
<table>
    <tr>
        <td width="170">Услуга</td>
        <td width="70">Цена без НДС, руб.</td>
        <td width="40">Кол-во</td>
        <td width="40">Ед.</td>
    </tr>
    <tr>
        <td width="170"><b>{{$order->service_name}}</b>
        </td>
        <td width="70">{{$order->ticket->price}}</td>
        <td width="40">{{$order->amount}}</td>
        <td width="40">билет</td>
    </tr>
</table>
<table>
    <tr>
        <td class="noborder"><b>Итого к оплате без НДС: {{$order->ticket->price * $order->amount}} руб.</b></td>
        <td class="noborder">НДС не облагается<br>в связи с применением УСН</td>
    </tr>
</table>
<p>Настоящий Заказ и Сроки и Условия, содержащиеся в нем, подтверждены и согласованы</p>
<p><b>Заказчик</b></p>
<table>
    <tr>
        <td style="border:none;">{{$order['position']}} {{$order['general_manager']}}<br>Действует на основании: {{$order['reason']}}</td>
        <td style="border:none;text-align:right">Дата: {{date('d.m.Y', strtotime($order['created_at']))}}</td>
    </tr>
</table>
<hr>
<p><b>Исполнитель</b></p>
<table>
    <tr>
        <td style="border:none;">{{$company['position']}} {{$company['general_manager']}}<br>Действует на основании: {{$company['reason']}}</td>
        <td style="border:none;text-align:right">Дата: {{date('d.m.Y', strtotime($order['created_at']))}}</td>
    </tr>
</table>
</body>
</html>
