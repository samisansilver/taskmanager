<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karato Edit Kon') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                <form action="/edit/{{ $id }}" method="post" style="padding:40px;margin:40px">
                    @csrf
                    <label>توضیحات</label>
                    <label>
                        <input style="width: 100%; border: 1px solid black; height: 200px;" type="textarea" name="description" value="{{ $ourjob->description }}">
                    </label><br>
                    <label>
                        <input name="user" value="" hidden="">
                    </label><br>
                    <label for="process">درصد پیشرفت</label><br><br>
                    <input style="width: 50%; direction: rtl" name="process" type="range" value="{{ $ourjob->process }}" min="0" max="100" step="10" list="values"><br><br>
                    <datalist id="values">
                        <option value="0" label="0"></option>
                        <option value="10" label="10"></option>
                        <option value="20" label="20"></option>
                        <option value="30" label="30"></option>
                        <option value="40" label="40"></option>
                        <option value="50" label="50"></option>
                        <option value="60" label="60"></option>
                        <option value="70" label="70"></option>
                        <option value="80" label="80"></option>
                        <option value="90" label="90"></option>
                        <option value="100" label="100"></option>
                    </datalist>
                    <button style="background: green; color: white; padding: 10px">ارسال</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
