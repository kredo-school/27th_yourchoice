@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
<link rel="stylesheet" href="{{ asset('css/hotel_reservation.css') }}">
<script src="{{ asset('js/flatpickr.js') }}"></script>

@section('content')
<div class="container">
        <h1>Reservation Management</h1>
        <div class="navigation">
            <button class="btn btn-nav btn-outline-secondary">&lt;</button>
            <input type="date" id="date-picker" value="2024-11-08" class="date-picker">
            <button class="btn btn-nav btn-outline-secondary">&gt;</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#date-picker", {
                    dateFormat: "Y/ m /d (D)", // 年-月-日のフォーマット
                    defaultDate: "2024-11-08", // デフォルトの日付
                    onChange: function(selectedDates, dateStr, instance) {
                        console.log("Selected date: ", dateStr); // 選択された日付を取得
                        // 必要に応じて、日付の更新処理を追加
                    }
                });
            });
        </script>

        <table class="reservation-table">
            <thead>
                <tr>
                    <th class="col1"></th>
                    <th class="col2">Room No.</th>
                    <th class="col3">Name</th>
                    <th class="col4">People</th>
                    <th class="col5">Check-in date</th>
                    <th class="col6">Check-out date</th>
                    <th class="col7">Option</th>
                    <th class="col8">Payment</th>
                    <th class="col9">Check-in</th>
                    <th class="col10">Phone number</th>
                    <th class="col11">Customer request</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>101</td>
                    <td>Shinji Watanabe</td>
                    <td>1</td>
                    <td>2024/11/8</td>
                    <td>2024/11/10</td>
                    <td>breakfast</td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td>080-3452-5212</td>
                    <td>Please provide a room on a higher floor with a quiet environment.</td>
                </tr>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>102</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>103</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>201</td>
                    <td>AAAA BBB</td>
                    <td>1</td>
                    <td>2024/11/8</td>
                    <td>2024/11/10</td>
                    <td>breakfast</td>
                    <td>
                        <select>
                            <option>pending</option>
                            <option>done</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>not done</option>
                            <option>done</option>
                        </select>
                    </td>
                    <td>080-3452-5212</td>
                    <td>Please ensure the room is wheelchair accessible.</td>
                </tr>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>202</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href=""><img src="{{ asset('images/pen-to-square-solid.svg') }}" class="edit-logo"></a></td>
                    <td>203</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>pending</option>
                        </select>
                    </td>
                    <td>
                        <select>
                            <option>done</option>
                            <option>not done</option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection