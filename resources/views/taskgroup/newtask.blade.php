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
                    <form action="{{ route('createtask') }}" method="post">
                        @csrf
                        <input type="text" name="title" id="title" placeholder="عنوان">
                        <input type="text" name="description" id="description" placeholder="توضیحات">
                        <input type="number" name="persons" id="persons" placeholder="تعداد افراد">
                        <button type="submit">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
