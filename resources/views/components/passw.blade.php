@props([
    'id' => '',
    'name' => '',
    'errors' => '',
    'placeholder' => '',
    'autocomplete' => '',
    'class' => '',
])
<div class="relative" x-data="{ show: false }">
    <input :type="show ? 'text' : 'password'" type="password"
        @if (!empty($id)) id="{{ $id }}" @endif
        @if (!empty($name)) name="{{ $name }}" @endif
        @if (!empty($placeholder)) placeholder="{{ $placeholder }}" @endif
        @if (!empty($name)) autocomplete="{{ $name }}" @endif value="{{ old($name) }}"
        class="w-full form-input px-2.5 py-1.5 mb-4 text-xs placeholder-gray-500 bg-gray-100 border rounded xl:mb-6 xl:px-4 xl:py-3 xl:text-sm placeholder:font-light focus:ring-0 focus:outline-none focus:bg-gray-100 @error($name) border-red-600 focus:border-red-400 @elseerror border-gray-200 focus:border-gray-400  @enderror {{ $class }}" />
    @error($name)
        <span class="absolute w-full text-[10px] xl:text-xs text-red-600 left-0 xl:left-1.5 bottom-0 xl:bottom-1.5">
            {{ $message }}
        </span>
    @enderror
    <div @click="show = !show"
        class="absolute right-[3.5%] xl:right-[2.5%] top-[18.5%] xl:top-[20%] hover:cursor-pointer flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            :class="{
                'hidden ': show,
                'flex w-3.5 h-3.5 lg:w-4 lg:h-4 xl:w-5 xl:h-5 stroke-teal-600 @error($name) stroke-red-600 @enderror': !
                    show
            }">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor"
            :class="{
                'hidden': !show,
                'flex w-3.5 h-3.5 lg:w-4 lg:h-4  xl:w-5 xl:h-5 stroke-red-600': show
            }">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
    </div>
</div>
