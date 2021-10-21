<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php
                $user = Auth::user();
                if($user->role == 1 && $user->teacherStatus == 0)
                {
                ?>
                    {{ __('You have to answer atleast 7 questions correctly to proceed.') }}
                <?php    
                }
                else if($user->role == 1 && $user->teacherStatus == 2)
                {
                ?>
                    {{ __('You have passed MCQS test. Now schedule an interview to get your account approved.') }}
                <?php 
                }
                else if($user->role == 1 && $user->teacherStatus == 3)
                {
                ?>
                     {{ __('You are Fail!.') }}
                <?php
                }
                else if($user->role == 2)
                {
                ?>
                    {{ __('Welcome to Admin Dashboard.') }}
                    <x-jet-section-border />
                    <div class="mt-10 sm:mt-0">
                        <a href="{{route('userDashboard')}}">Dashboard</a>
                    </div>
                <?php    
                }
                else
                {
                ?>
                    {{ __('Proceed to dashboard if you have a stable internet connection.') }}
                    <x-jet-section-border />
                    <div class="mt-10 sm:mt-0">
                        <a href="{{route('userDashboard')}}">Dashboard</a>
                    </div>

                <?php
                }
            ?>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php
                $user = Auth::user();
                ?>
                @if($user->role == 1 && $user->teacherStatus == 0)
                    @if($user->id%4 == 0)
                        @include('quiz1')
                    @elseif($user->id%4 == 1)
                        @include('quiz2')
                    @elseif($user->id%4 == 2)
                        @include('quiz3')
                    @else
                        @include('quiz4')
                    @endif
                @elseif($user->role == 1 && $user->teacherStatus == 2)
                    <!-- Calendly badge widget begin -->
                    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
                    <script type="text/javascript">Calendly.initBadgeWidget({ url: 'https://calendly.com/alikhanwwe150/15min', text: 'Schedule time with me', color: '#00a2ff', textColor: '#ffffff', branding: true });</script>
                    <!-- Calendly badge widget end -->
                @elseif($user->role == 1 && $user->teacherStatus == 3)
                    <h1>Sorry You are Fail!</h1>
                @endif

                
            </div>
        </div>
    </div>
</x-app-layout>

