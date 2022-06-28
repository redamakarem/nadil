
require('./bootstrap');

// require('alpinejs');

Echo.channel('public.nadilNotification')
.listen('.nadilNotification',(e)=>{
    toastr.success(e.message)
});

