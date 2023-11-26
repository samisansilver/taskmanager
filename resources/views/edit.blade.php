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
                        <label>درصد پیشرفت</label>
                        <select type="text" name="process" id="process">
                                <option type="text" name="process" value="1">25%</option>
                                <option type="text" name="process" value="2">50%</option>
                                <option type="text" name="process" value="3">75%</option>
                                <option type="text" name="process" value="4">100%</option>
                        </select>
                    <button>ارسال</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
