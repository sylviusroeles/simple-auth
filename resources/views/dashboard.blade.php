<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <div class="bg-white mt-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-bold mb-4 text-lg">Login Attempts</h2>
                    <table class="table-auto w-full border-collapse">
                        <tr>
                            <th class="border-solid border">Date</th>
                            <th class="border-solid border">IP</th>
                            <th class="border-solid border">User Agent</th>
                            <th class="border-solid border">Action</th>
                        </tr>
                        @foreach($loginAttempts as $loginAttempt)
                            <tr class="border-solid">
                                <td class="border-solid border">{{$loginAttempt->created_at->format('d-m-Y H:i')}}</td>
                                <td class="border-solid border">{{$loginAttempt->ip_address}}</td>
                                <td class="border-solid border">{{$loginAttempt->user_agent}}</td>
                                <td class="border-solid border">{{$loginAttempt->action}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
