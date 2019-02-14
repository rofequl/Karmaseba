@extends('frontend.layout.app')

@section('content')

    <style>
        #repair2 .onlyThisPage {
            width: 16px;
            background-color: white;
            margin: -9px auto 10px;
            height: 16px;
            border-radius: 50%;
            border: 3px solid #00c300;

        }
    </style>

    <section id="repair2">
        <div class="w-100 text-center font-weight-bold  my-5 p-2 text-white bg-success">
            TV REPAIR
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 line"></div>
            </div>
            <div class="row text-center serviceListText justify-content-center">
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair1')}}" class="serviceListText">Your Needs</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair2')}}" class="serviceListText">Your Location</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall onlyThisPage"></div>
                    <a href="{{route('repair3')}}" class="serviceListText">Schedule</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair4')}}" class="serviceListText">Select Provider</a>
                </div>
                <div class="col-2">
                    <div class="scoverBall"></div>
                    <a href="{{route('repair5')}}" class="serviceListText">Check Out</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 my-4">
                    <div class="card bg-light-gradient">
                        <div class="card-header no-border ui-sortable-handle" style="cursor: move;">

                            <h3 class="card-title">
                                <i class="fa fa-calendar"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bars"></i></button>
                                    <div class="dropdown-menu float-right" role="menu" x-placement="bottom-start"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%">
                                <div class="datepicker datepicker-inline">
                                    <div class="datepicker-days" style="display: block;">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <th class="prev" style="visibility: visible;">«</th>
                                                <th colspan="5" class="datepicker-switch">May 2019</th>
                                                <th class="next" style="visibility: visible;">»</th>
                                            </tr>
                                            <tr>
                                                <th class="dow">Su</th>
                                                <th class="dow">Mo</th>
                                                <th class="dow">Tu</th>
                                                <th class="dow">We</th>
                                                <th class="dow">Th</th>
                                                <th class="dow">Fr</th>
                                                <th class="dow">Sa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="old day">28</td>
                                                <td class="old day">29</td>
                                                <td class="old day">30</td>
                                                <td class="day">1</td>
                                                <td class="day">2</td>
                                                <td class="day">3</td>
                                                <td class="day">4</td>
                                            </tr>
                                            <tr>
                                                <td class="day">5</td>
                                                <td class="day">6</td>
                                                <td class="day">7</td>
                                                <td class="day">8</td>
                                                <td class="day">9</td>
                                                <td class="day">10</td>
                                                <td class="day">11</td>
                                            </tr>
                                            <tr>
                                                <td class="day">12</td>
                                                <td class="day">13</td>
                                                <td class="day">14</td>
                                                <td class="day">15</td>
                                                <td class="day">16</td>
                                                <td class="day">17</td>
                                                <td class="day">18</td>
                                            </tr>
                                            <tr>
                                                <td class="day">19</td>
                                                <td class="day">20</td>
                                                <td class="day">21</td>
                                                <td class="day">22</td>
                                                <td class="day">23</td>
                                                <td class="day">24</td>
                                                <td class="day">25</td>
                                            </tr>
                                            <tr>
                                                <td class="day">26</td>
                                                <td class="day">27</td>
                                                <td class="day">28</td>
                                                <td class="day">29</td>
                                                <td class="day">30</td>
                                                <td class="day">31</td>
                                                <td class="new day">1</td>
                                            </tr>
                                            <tr>
                                                <td class="new day">2</td>
                                                <td class="new day">3</td>
                                                <td class="new day">4</td>
                                                <td class="new day">5</td>
                                                <td class="new day">6</td>
                                                <td class="new day">7</td>
                                                <td class="new day">8</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="7" class="today" style="display: none;">Today</th>
                                            </tr>
                                            <tr>
                                                <th colspan="7" class="clear" style="display: none;">Clear</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="datepicker-months" style="display: none;">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <th class="prev" style="visibility: visible;">«</th>
                                                <th colspan="5" class="datepicker-switch">2019</th>
                                                <th class="next" style="visibility: visible;">»</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="7"><span class="month">Jan</span><span
                                                            class="month active">Feb</span><span
                                                            class="month">Mar</span><span class="month">Apr</span><span
                                                            class="month">May</span><span class="month">Jun</span><span
                                                            class="month">Jul</span><span class="month">Aug</span><span
                                                            class="month">Sep</span><span class="month">Oct</span><span
                                                            class="month">Nov</span><span class="month">Dec</span></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="7" class="today" style="display: none;">Today</th>
                                            </tr>
                                            <tr>
                                                <th colspan="7" class="clear" style="display: none;">Clear</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="datepicker-years" style="display: none;">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <th class="prev" style="visibility: visible;">«</th>
                                                <th colspan="5" class="datepicker-switch">2010-2019</th>
                                                <th class="next" style="visibility: visible;">»</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span
                                                            class="year">2011</span><span class="year">2012</span><span
                                                            class="year">2013</span><span class="year">2014</span><span
                                                            class="year">2015</span><span class="year">2016</span><span
                                                            class="year">2017</span><span class="year">2018</span><span
                                                            class="year active">2019</span><span
                                                            class="year new">2020</span></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="7" class="today" style="display: none;">Today</th>
                                            </tr>
                                            <tr>
                                                <th colspan="7" class="clear" style="display: none;">Clear</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-3 my-4">
                    <button class="btn btn-success">
                        Select and Continue
                    </button>


                </div>
            </div>

        </div>
    </section>

    @include('frontend.service.component.layout')

@endsection