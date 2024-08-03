@if (session()->has('success_message'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 9000)" x-show="show" 
    class="position-fixed top-0 end-0 p-3 m-3 bg-success text-white rounded shadow-sm">
   <div class="container">
       <div class="d-flex justify-content-between align-items-center">
           <div>
               <h5 class="mb-0">{{ session('notification_title') }}</h5>
               <p class="mb-0">{{ session('success_message') }}</p>
           </div>
           <button @click="show = false" class="btn-close btn-close-white" aria-label="Close"></button>
       </div>
   </div>
</div>
@endif