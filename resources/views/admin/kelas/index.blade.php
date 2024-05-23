@extends('admin.layouts.main')

@section('container')
    @include('admin.dashboard._header')

    <div class="px-4 pt-24 bg-slate-200 dark:bg-gray-800 h-screen">
        <div class="flex justify-end m-5">
            <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                type="button">
                Buat Kelas
            </button>
        </div>
        <div class="p-1 flex flex-wrap items-center justify-center">

            @foreach ($data as $no => $item)

            {{-- @dd($data) --}}

                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-white rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                        style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8"
                            transform="rotate(-45 159.52 175)" fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="white" />
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40" src="{{ asset('img/logo2.png') }}" alt="">
                    </div>
                    <div class="relative text-black px-6 pb-6 mt-6">
                        {{-- <span class="block opacity-75 -mb-1">Kelas Tasnawiyah 1</span> --}}
                        <span class="block font-semibold text-xl text-center">{{ $item->nama_kelas }}</span>
                        <span class="block font-semibold text-sm text-center">{{ $item->guru->nama }}</span>




                        <div class="text-center items-center">
                            <button id="dropdownDefaultButton" onclick="update_{{ $no }}.showModal()"
                                class="bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none text-center">Edit
                                Kelas</button>

                            <button id="dropdownDefaultButton" onclick="hapus_{{ $no }}.showModal()"
                                class="bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none text-center">Hapus</button>
                        </div>
                    </div>
                </div>
            @endforeach



            {{-- modal edit --}}
            @foreach ($data as $update => $edit)
                <dialog id="update_{{ $update }}" class="modal">

                    <div class="modal-box bg-white">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <form action="/kelas/edit/{{ $edit->kelas_id }}" method="POST">
                            @csrf
                            <label class="items-center gap-2 ">
                                <h1 class="font-semibold text-black mb-2 mt-2">
                                    Kelas
                                </h1>
                                <input type="text" name="nama_kelas" class="grow rounded-lg w-full text-black"
                                    placeholder="Kepohbaru" value="{{ $edit->nama_kelas }}" />

                                    <select name="user" id="" class="w-full text-black mt-3">
                                        @foreach ($user as $ustad)
                                            <option class="capitalize" value="{{ $ustad->user_id }}">{{ $ustad->nama }} 
                                               Pelajaran {{ $ustad->role }}
                                            </option>
                                        @endforeach
                                    </select>

                            </label>
                            <div class="modal-action">
                                <label for="closeDelete"
                                    class="btn bg-red-600 hover:bg-red-700 border-none text-white">Tidak</label>
                                <button type="submit"
                                    class="btn bg-lime-600 hover:bg-lime-700 border-none text-white">Edit</button>
                            </div>
                        </form>
                        <form method="dialog"
                            class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white hidden">
                            <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
                            <div class="modal-action">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="btn" id="closeDelete">Close</button>
                            </div>
                        </form>
                    </div>
                </dialog>
            @endforeach



            {{-- hapus kelas --}}
            @foreach ($data as $hapus => $item)
            <dialog id="hapus_{{ $hapus }}" class="modal modal-bottom sm:modal-middle ">
                <form action="/kelas/hapus/{{ $item->kelas_id }}" method="POST"
                    class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    @csrf
                    <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
                    <div class="modal-action">
                        <label for="closeDelete"
                            class="btn bg-red-600 hover:bg-red-700 border-none text-white">Tidak</label>
                        <button class="btn bg-lime-600 hover:bg-lime-700 border-none text-white">Hapus</button>
                    </div>
                </form>
                <form method="dialog" class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white hidden">
                    <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
                    <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn" id="closeDelete">Close</button>
                    </div>
                </form>
            </dialog>
        @endforeach



            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah Kelas
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="/kelas/add" method="POST">
                            @csrf
                            <div class="mb-4 ">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Kelas</label>
                                    <input type="text" name="nama_kelas" id="nama_kelas"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama Kelas" required="">
                                </div>

                                <select name="user" id="" class="w-full text-black mt-3 rounded-lg">
                                    @foreach ($user as $ustad)
                                        <option class="capitalize" value="{{ $ustad->user_id }}">{{ $ustad->nama }} 
                                           Pelajaran {{ $ustad->role }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection
