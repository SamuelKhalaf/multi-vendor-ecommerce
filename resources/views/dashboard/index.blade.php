@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-2">
                                            <span><i class="cc BTC warning font-large-2" title="BTC"></i></span>
                                        </div>
                                        <div class="col-auto">
                                            <h4>إجمالى المبيعات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <h4>$107,000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-2">
                                            <span><i class="cc BTC warning font-large-2" title="BTC"></i></span>
                                        </div>
                                        <div class="col-auto">
                                            <h4>إجمالى الطلبات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <h4>$107,000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-2">
                                            <span><i class="cc BTC warning font-large-2" title="BTC"></i></span>
                                        </div>
                                        <div class="col-auto">
                                            <h4>عدد المنتجات</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <h4>$107,000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-2">
                                            <span><i class="cc BTC warning font-large-2" title="BTC"></i></span>
                                        </div>
                                        <div class="col-auto">
                                            <h4>عدد العملاء</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <h4>$107,000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">أحدث الطلبات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>اسم العميل</th>
                                            <th>السعر</th>
                                            <th>حالة الطلب</th>
                                            <th>الإجمالى</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-success bg-lighten-5">
                                            <td>1054</td>
                                            <td>مينا رضا</td>
                                            <td>$4762</td>
                                            <td>مكتمل</td>
                                            <td>$4762</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">أخر التقييمات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>العميل</th>
                                            <th>المنتج</th>
                                            <th>التقييم</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-danger bg-lighten-5">
                                            <td>صموئيل</td>
                                            <td>لابتوب</td>
                                            <td>5</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
            </div>
        </div>
    </div>
@endsection
