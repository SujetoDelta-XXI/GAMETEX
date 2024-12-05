@php
    $user = Auth::guard('user')->user() ?? (Auth::guard('admin')->user() ?? Auth::guard('moder')->user());
    $userType = Auth::guard('admin')->check()
        ? 'Admin'
        : (Auth::guard('moder')->check()
            ? 'Moderator'
            : (Auth::guard('user')->check()
                ? 'User'
                : 'Guest'));
@endphp

<span class="inline-flex rounded-md">
    <button type="button"
        class="inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
        <div>
            <img class="rounded-full w-10 h-10 relative object-cover"
                src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                alt="">
        </div>
        <div class="flex items-center pl-4">
            <p class="w-full font-medium group-hover:text-indigo-400 leading-4">
                {{ $user->name }} ({{ $userType }})
            </p>
        </div>
    </button>
</span>
