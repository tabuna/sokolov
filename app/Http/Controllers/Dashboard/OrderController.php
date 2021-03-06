<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\OrderElementRequest;
use App\Models\Comments;
use App\Models\Files;
use App\Models\LangOrder;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*
         * http://s00.yaplakal.com/pics/pics_original/7/8/2/6036287.jpg
         */

        if (!is_null(request()->status)) {
            $orderStatus = request()->status;

            if ($orderStatus == 'pay') {
                $orderStatus = 'В работе';
            } elseif ($orderStatus == 'ocenka') {
                $orderStatus = 'На оценке';
            } elseif ($orderStatus == 'canlcel') {
                $orderStatus = 'Отменён';
            } elseif ($orderStatus == 'notpay') {
                $orderStatus = 'Не оплачен';
            } elseif ($orderStatus == 'done') {
                $orderStatus = 'Готова';
            } elseif ($orderStatus == 'all') {
                $orderStatus = 'all';
            }
        } else {
            $orderStatus = null;
        }

        if ((is_null($orderStatus)) || ($orderStatus == 'all')) {
            $Orders = Order::select('id', 'name', 'created_at', 'act')->orderBy('id', 'desc')->paginate(30);
        } else {
            $Orders = Order::select('id', 'name', 'created_at')
                ->whereRaw('status = ?', [$orderStatus])
                ->orderBy('id', 'desc')
                ->paginate(15);
        }

        return view('dashboard/order/order', [
            'Orders' => $Orders,
            'CountPay' => Order::where('status', 'В работе')->count(),
            'CountOcenka' => Order::where('status', 'На оценке')->count(),
            'CountCanlcel' => Order::where('status', 'Отменён')->count(),
            'CountNotpay' => Order::where('status', 'Не оплачен')->count(),
            'CountDone' => Order::where('status', 'Готова')->count(),
            'Count' => Order::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!is_null(request()->status)) {
            $orderStatus = request()->status;

            if ($orderStatus == 'pay') {
                $orderStatus = 'В работе';
            } elseif ($orderStatus == 'done') {
                $orderStatus = 'Завершён';
            } elseif ($orderStatus == 'all') {
                $orderStatus = 'all';
            }
        } else {
            $orderStatus = null;
        }

        if ((is_null($orderStatus)) || ($orderStatus == 'all')) {
            $Orders = Order::select('id', 'name', 'created_at')
                ->orderBy('id', 'desc')
                ->simplePaginate(15);
        } else {
            $Orders = Order::select('id', 'name', 'created_at')
                ->whereRaw('status = ?', [$orderStatus])
                ->orderBy('id', 'desc')
                ->simplePaginate(15);
        }

        $SelectOrder = Order::findorfail($id);

        $SelectLanguage = LangOrder::where('id', $SelectOrder->LangOrder_id)->first();

        $SelectUser = $SelectOrder->getUser()->get()->first();
        $SelectComments = Comments::whereRaw('type = ? and beglouto = ?', ['order', $id])->get();
        $SelectGoods = $SelectOrder->getGoods()->get();

        $SelectGoodFile = Files::select('id', 'original', 'created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, true])->get();

        $SelectRequestFile = Files::select('id', 'original', 'created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, false])->get();

        $AllUser = DB::table('users')
            ->select('users.*')
            ->leftJoin('skills', 'users.id', '=', 'skills.user_id')
            ->leftJoin('orderMeta', 'orderMeta.category_id', '=', 'skills.category_id')
            ->groupBy('users.id')
            ->where('users.role', 'LIKE', '%editor%')
            ->where('orderMeta.order_id', '=', $id)
            ->get();

        $TaskOrder = $SelectOrder->getTask()->get();

        return view('dashboard/order/orderElement', [
            'Orders' => $Orders,
            'SelectOrder' => $SelectOrder,
            'SelectUser' => $SelectUser,
            'SelectComments' => $SelectComments,
            'SelectGoods' => $SelectGoods,
            'SelectGoodFile' => $SelectGoodFile,
            'SelectRequestFile' => $SelectRequestFile,
            'AllUser' => $AllUser,
            'TaskOrder' => $TaskOrder,
            'SelectLanguage' => $SelectLanguage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(OrderElementRequest $request, $id)
    {
        $order = Order::findorFail($id);
        $order->fill($request->all());
        $order->save();
        Session::flash('good', 'Вы успешно изменили значения');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
