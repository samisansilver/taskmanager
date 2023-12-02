<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sakht Tamin Konande') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                    <form action="/supply/createcompany" method="post" style="padding:40px;margin:40px">
                        @csrf
                        <table>
                            <tr>
                                <td><input name="person" type="text" placeholder="نام شخص" value=""></td>
                                <td><input name="company" type="text" placeholder="نام شرکت" value=""></td>
                                <td><input name="phone" type="text" placeholder="تلفن" value=""></td>
                                <td><input name="mobile" type="text" placeholder="موبایل" value=""></td>
                                <td><input name="address" type="text" placeholder="آدرس" value=""></td>
                            </tr>
                        </table>

                        <label>چاپ</label>
                        <input name="chap" type="checkbox" value="1">
                        <label>هدایای تبلیغاتی</label>
                        <input name="gifts" type="checkbox" value="1">
                        <label>رسانه محیطی</label>
                        <input name="ads" type="checkbox" value="1">
                        <label>تابلو سر درب</label>
                        <input name="tablosardarb" type="checkbox" value="1">
                        <label>دکور فروشگاه</label>
                        <input name="decor" type="checkbox" value="1">
                        <label>استند فروشگاه</label>
                        <input name="stand" type="checkbox" value="1">
                        <label>آژانس تبلیغاتی</label>
                        <input name="adsagency" type="checkbox" value="1">
                        <label>شرکت های تشریفاتی</label>
                        <input name="cip" type="checkbox" value="1">
                        <label>بسته بندی و کارتن سازی</label>
                        <input name="bastebandi" type="checkbox" value="1">
                        <label>مدیران مارکتینگ</label>
                        <input name="adsmanager" type="checkbox" value="1">
                        <label>گرافیست</label>
                        <input name="graphist" type="checkbox" value="1">
                        <label>فریلنسر</label>
                        <input name="freelancer" type="checkbox" value="1">
                        <label>گوینده و نریتور</label>
                        <input name="narator" type="checkbox" value="1">
                        <label>غرفه سازی و نمایشگاه</label>
                        <input name="exhibition" type="checkbox" value="1"></td>>
                        <table>
                        <td><input name="age" type="date" placeholder="سابقه همکاری" value=""></td>
                        <td><input name="city" type="text" placeholder="شهر" value=""></td>
                        <td><input name="site" type="text" placeholder="سایت" value=""></td>
                        <td><input name="email" type="text" placeholder="ایمیل" value=""></td>
                        <label for="quality">کیفیت خدمات</label>
                        <select id="quality" name="quality">
                            <option value="5">عالی</option>
                            <option value="4">خوب</option>
                            <option value="3">متوسط</option>
                            <option value="2">ضعیف</option>
                            <option value="1">بقایی</option>
                        </select></td>
                        </table>
                        <table>
                        <td><input name="codeeghtesadi" type="text" placeholder="کد اقتصادی" value=""></td>
                        <td><input name="shenasemelli" type="text" placeholder="شناسه ملی" value=""></td>
                        <td><input name="shenasesabt" type="text" placeholder="شناسه ثبت" value=""></td>
                        <td><input name="codekargah" type="text" placeholder="کد کارگاه" value=""></td>
                        <td><input name="codesabtashkhas" type="text" placeholder="کد ثبت اشخاص" value=""></td>
                        </table>
                        <button style="width: 100%;background: green;height: 40px;color: white">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
