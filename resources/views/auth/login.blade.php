@extends('auth.layouts.main')

@section('container')


<section class="h-screen">
    <div class="h-full">
      <!-- Left column container with background-->
      <div
        class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
        <div
          class="shrink-1 mb-2 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-4/12">
          <img
            src="{{ asset ('img/login.svg') }}"
            class="w-full"
            alt="Sample image" />
        </div>
  
        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
          <form action="/login" method="POST">
          
            @csrf
            <div class="text-center">
                <p class="text-2xl font-semibold">
                    Login
                </p>
            </div>
  
            <!-- Separator between social media sign in and email/password sign in -->
            <div
              class="my-2 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
            </div>
  
            <!-- Email input -->
            <div class="w-full mb-2">
                <h1 class='text-lg font-normal'>Email</h1>
                <input type="email" placeholder='agungandhita@gmail.com' name="email"
                    class='rounded-md w-full border h-12 p-2 @error('ejmail')
            peer
          @enderror'
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror

            </div>
  
            <!-- Password input -->
            <div class="w-full">
                <h1 class='text-lg font-normal'>Password</h1>
                <input type="password" placeholder='Password' name="password"
                    class='rounded-md w-full border h-12 p-2 @error('password')
            peer
          @enderror'
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror

            </div>
  
            <div class="mb-2 mt-2 flex items-center justify-between border border-red-700">
              <!--Forgot password link-->
              <a href="#!">Forgot password?</a>
  
            <!-- Login button -->
            <div class="text-center lg:text-left flex justify-between lg:w-20">
              <button
                type="submit"
                class="inline-block rounded bg-primary px-5 pb-2 pt-2 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light">
                Login
              </button>
            </div>
  
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- https://play.tailwindcss.com/MIwj5Sp9pw -->

    
@endsection