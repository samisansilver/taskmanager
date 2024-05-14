<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kar Betarash Bara Vahed') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                    <form action="/submitjob" method="post" style="padding:40px;margin:40px">
                        @csrf
                        <label>عنوان</label>
                        <input type="text" name="title" value=""><br>
                        <label>توضیحات</label>
                        <input style="width: 100%; border: 1px solid black; height: 200px;" type="textarea" name="description" value=""><br>
                        @if(\Illuminate\Support\Facades\Auth::user()->user_role == null)
                            <input type="text" name="user" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" hidden=""><br>
                        @else
                            <label>انتخاب کاربر</label>
                            <select type="text" name="user" id="user">
                                {{ $users = \App\Models\User::all() }}
                                @foreach($users as $user)
                                    <option type="text" name="user" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <input class="format-example" name="due_time"/>
                        <button>ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
<script type="text/javascript" src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>
    <script type="text/javascript">
            $('.format-example').persianDatepicker({
                "inline": false,
                "format": "",
                "viewMode": "day",
                "initialValue": true,
                "autoClose": true,
                "position": "auto",
                "altFormat": "",
                "altField": "#altfieldExample",
                "onlyTimePicker": false,
                "onlySelectOnDate": false,
                "calendarType": "persian",
                "inputDelay": 800,
                "observer": false,
                "calendar": {
                    "persian": {
                        "locale": "en",
                        "showHint": true,
                        "leapYearMode": "algorithmic"
                    },
                    "gregorian": {
                        "locale": "en",
                        "showHint": true
                    }
                },
                "navigator": {
                    "enabled": true,
                    "scroll": {
                        "enabled": true
                    },
                    "text": {
                        "btnNextText": "<",
                        "btnPrevText": ">"
                    }
                },
                "toolbox": {
                    "enabled": true,
                    "calendarSwitch": {
                        "enabled": true,
                        "format": "MMMM"
                    },
                    "todayButton": {
                        "enabled": true,
                        "text": {
                            "fa": "امروز",
                            "en": "Today"
                        }
                    },
                    "submitButton": {
                        "enabled": true,
                        "text": {
                            "fa": "تایید",
                            "en": "Submit"
                        }
                    },
                    "text": {
                        "btnToday": "امروز"
                    }
                },
                "timePicker": {
                    "enabled": true,
                    "step": 1,
                    "hour": {
                        "enabled": true,
                        "step": null
                    },
                    "minute": {
                        "enabled": true,
                        "step": null
                    },
                    "second": {
                        "enabled": true,
                        "step": null
                    },
                    "meridian": {
                        "enabled": true
                    }
                },
                "dayPicker": {
                    "enabled": true,
                    "titleFormat": "YYYY MMMM"
                },
                "monthPicker": {
                    "enabled": true,
                    "titleFormat": "YYYY"
                },
                "yearPicker": {
                    "enabled": true,
                    "titleFormat": "YYYY"
                },
                "responsive": false
            });
    </script>
