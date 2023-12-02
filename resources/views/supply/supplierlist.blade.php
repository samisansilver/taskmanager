<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Sherkatha & Afrado Bebin') }}
        </h2>
    </x-slot>
    @yield('head')
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                        <input name="supplier" value="chap" hidden>
                                        <button style="width: 100%; height: 100%">خدمات چاپ</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                        <input name="supplier" value="gifts" hidden>
                                        <button style="width: 100%; height: 100%">هدایای تبلیغاتی</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="adsmanager" hidden>
                                    <button style="width: 100%; height: 100%">رسانه های محیطی</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="tablosardarb" hidden>
                                    <button style="width: 100%; height: 100%">تابلو سردرب</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="decor" hidden>
                                    <button style="width: 100%; height: 100%">دکور فروشگاه</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="stand" hidden>
                                    <button style="width: 100%; height: 100%">استند فروشگاه</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="adsagency" hidden>
                                    <button style="width: 100%; height: 100%">آژانس های تبلیغاتی</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="cip" hidden>
                                    <button style="width: 100%; height: 100%">خدمات تشریفات</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="bastebandi" hidden>
                                    <button style="width: 100%; height: 100%">بسته بندی و کارتن سازی</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="adsmanager" hidden>
                                    <button style="width: 100%; height: 100%">مدیران مارکتینگ و بازاریابی</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="graphist" hidden>
                                    <button style="width: 100%; height: 100%">گرافیست</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="freelancer" hidden>
                                    <button style="width: 100%; height: 100%">فریلنسر سوشال</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="narator" hidden>
                                    <button style="width: 100%; height: 100%">گوینده و نریتور</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/supply/getsupplier" method="post">
                                        @csrf
                                    <input name="supplier" value="exhibition" hidden>
                                    <button style="width: 100%; height: 100%">غرفه ساز نمایشگاهی</button>
                                    </form>
                                </td>
                                <td><input name="" value="1" hidden><button style="width: 100%; height: 100%">-</button></td>
                                <td><input name="" value="1" hidden><button style="width: 100%; height: 100%">-</button></td>
                            </tr>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</x-app-layout>
