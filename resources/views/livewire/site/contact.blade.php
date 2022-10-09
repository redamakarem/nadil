{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="py-5"></div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-4">--}}
{{--            <div class="buttons-container">--}}
{{--                <div class="d-grid gap-2 col-8 mx-auto">--}}
{{--                    <a href="#" class="btn btn-primary shadow rounded-lg">Button</a>--}}
{{--                    <a href="#" class="btn btn-primary shadow">Button</a>--}}
{{--                    <a href="#" class="btn btn-primary shadow">Button</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="form-container ">--}}
{{--                <form wire:submit.prevent="submit">--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('contact.name') <span class="danger">{{$message}}</span> @enderror--}}

{{--                        <input wire:model.lazy="contact.name"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Your Name">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('contact.email') <span class="danger">{{$message}}</span> @enderror--}}

{{--                        <input wire:model.lazy="contact.email"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Your E-mail">--}}
{{--                    </div>--}}

{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('contact.subject') <span class="danger">{{$message}}</span> @enderror--}}
{{--                        <input wire:model.lazy="contact.subject"--}}
{{--                               type="text" class="form-control"--}}
{{--                               placeholder="Subject">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3 shadow input-container">--}}
{{--                        @error('contact.message') <span class="danger">{{$message}}</span> @enderror--}}
{{--                        <textarea rows="4" wire:model.lazy="contact.message"--}}
{{--                               type="text" class="form-control"--}}
{{--                                  placeholder="Your Message"></textarea>--}}
{{--                    </div>--}}

{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <button class="btn-nadil" type="submit">Send</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="py-3"></div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="flex px-16">
    <div class="w-[31%] flex flex-col justify-center px-12 space-y-8">
        <h2 class="font-din text-[20px] uppercase tracking-[6px] text-center">Contact Us</h2>
        <a href="#" class="font-lato font-bold uppercase text-md text-center tracking-[6px] p-8 font-bold shadow-md rounded-[19px] bg-[#f8f8f8] border-[#707070]">Contact Us</a>
        <a href="{{route('site.about')}}" class="font-lato font-bold uppercase text-md text-center tracking-[6px] p-8 font-bold shadow-md rounded-[19px] bg-[#f8f8f8] border-[#707070]">Join Us</a>
    </div>
    <div class="w-2/3 flex-1 flex-col items-center ">
        <div class="flex flex-col w-full rounded-[64px] border-2 bg-[#EFEFEF] my-12 px-16 py-12 space-y-8">
            <form wire:submit.prevent="submit" class="space-y-8">
                @if($errors->any())
                    <div id="validation-errors"
                         class="flex flex-col bg-red-600 px-8 py-12 text-white font-lato uppercase text-md tracking-[6px] rounded-[19px]">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div>

                    @if (session()->has('success'))

                        <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">

                            Message sent. We will get back to you as soon as possible.

                        </div>

                    @endif

                </div>
                <div class="w-full">
                    <input type="text" placeholder="Name" wire:model.lazy="contact.name"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-8 rounded-[19px]">
                </div>


                <div class="w-full">
                    <input type="text" placeholder="Email" wire:model.lazy="contact.email"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-8 rounded-[19px]">
                </div>

                <div class="w-full">
                    <input type="text" placeholder="Subject" wire:model.lazy="contact.subject"
                           class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-8 rounded-[19px]">
                </div>
                <div class="w-full">
                    <textarea rows="4"  placeholder="Message" wire:model.lazy="contact.message"
                              class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-8 rounded-[19px]"></textarea>
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                            class="font-lato uppercase px-12 py-4 bg-white shadow-md rounded-[12px] tracking-[4px] font-bold">All
                        Done!
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
