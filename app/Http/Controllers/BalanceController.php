<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    // можно было заморочиться с ресурсами, но я не стал этого делать :)

    public function userBalance(int $user_id)
    {
        // created_at не работает из-за вставки через сиды (одинаковое время)
        $userBalance = Balance::where('user_id', $user_id)->orderByDesc('id')->first();
        if ($userBalance) {
            $response = [
                'success' => true,
                'result'  => $userBalance->balance
            ];
        } else {
            $response = [
                'success' => false,
                'result'  => 'User is not found!'
            ];
        }
        return $response;
    }

    public function history(int $limit)
    {
        // created_at не работает из-за вставки через сиды (одинаковое время)
        // а вообще, довольно спорный момент - как лучше сортировать конкретно в данном случае
        return Balance::orderByDesc('id')->limit($limit)->get();
    }
}
