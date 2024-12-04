<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\TransaccionModel;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function pay(Request $request)
    {
        $data = $request->all();

        $transaccion = TransaccionModel::create([
            'torneo_id' => $data['torneo_id'],
            'cantidad' => 1, // En este caso, cantidad es 1 entrada por transacción
            'total' => $data['total'],
            'cliente_email' => $data['cliente_email'],
            'status' => 'pending', // Establecer el estado a pendiente al crear la transacción
        ]);


        if ($response->isSuccessful()) {
            $transaccion->update(['status' => 'completed']);
            $this->sendPaymentConfirmationEmail($transaccion->cliente_email, $transaccion->total);
            return back()->with('success', 'Pago realizado con éxito. Se ha enviado una confirmación a su correo electrónico.');
        } else {
            $transaccion->update(['status' => 'failed']);
            return back()->with('error', 'Hubo un problema al procesar el pago: ' . $response->getMessage());
        }
    }

    private function sendPaymentConfirmationEmail($email, $total)
    {
        $data = [
            'total' => $total,
            'date' => now(),
        ];

        Mail::send('emails.payment_confirmation', $data, function ($message) use ($email) {
            $message->to($email)->subject('Confirmación de Pago');
        });
    }
}
