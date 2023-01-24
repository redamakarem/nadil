<div class="rounded-[64px] border-2 bg-nadilBtn-100 w-full h-full p-8">
    <div class="flex rounded-[64px] border-2 bg-white h-full w-full">
        <div class="flex items-center w-full justify-between">
            <div class="flex flex-col w-full py-8 px-12">
                <h3 class="font-lato font-italic uppercase text-[21px] tracking-[10px] mb-12">Account Details</h3>
                <div class="w-full flex flex-col space-y-8">
                    <div class="flex w-full space-x-8">
                        <div class="font-lato font-bold uppercase text-[21px] tracking-[10px]">Name</div>
                        <input wire:model='profile.name' class="font-lato uppercase text-[21px] tracking-[10px] flex-1 focus:outline-none focus:ring focus:ring-gray-400" />
                    </div>
                    <div class="flex w-full space-x-8">
                        <div class="font-lato font-bold uppercase text-[21px] tracking-[10px]">Address</div>
                        <input wire:model='profile.address' class="font-lato uppercase text-[21px] tracking-[10px] flex-1 focus:outline-none focus:ring focus:ring-gray-400" />
                    </div>
                    <div class="flex w-full space-x-8">
                        <div class="font-lato font-bold uppercase text-[21px] tracking-[10px]">Phone</div>
                        <input wire:model='profile.phone' class="font-lato uppercase text-[21px] tracking-[10px] flex-1 focus:outline-none focus:ring focus:ring-gray-400" />
                    </div>
                    <div class="flex w-full space-x-8">
                        <div class="font-lato font-bold uppercase text-[21px] tracking-[10px]">Email</div>
                        <input wire:model='profile.email' class="font-lato uppercase text-[21px] tracking-[10px] flex-1 focus:outline-nonefocus:ring-nadilBtn-100" />
                    </div>
                    <div class="w-full">
                        <div
                            class="flex items-center w-full bg-white font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px] space-x-4">
                            <div>
                                <input type="radio" wire:model.lazy="profile.gender" id="male" value="0"/>
                                <label for="male">Male</label>
                            </div>
                            <div>
                                <input type="radio" wire:model.lazy="profile.gender" id="female" value="1"/>
                                <label for="female">Female</label>
                            </div>
                        </div>
    
                    </div>
                    <div class="w-full" wire:ignore>
                        <input id="dob" type="text" placeholder="Date of Birth" wire:model.lazy="profile.dob"
                               class="flex items-center w-full font-lato placeholder:font-bold text-[19px] tracking-[4px] uppercase border-[#707070] border-2 p-4 rounded-[19px]">
                    </div>
                    <div class="flex w-full space-x-8 justify-end">
                        <button wire:click='submit'
                            class="font-lato uppercase px-12 py-4 bg-white shadow-md rounded-[12px] tracking-[4px] font-bold">All
                        Done!
                    </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>