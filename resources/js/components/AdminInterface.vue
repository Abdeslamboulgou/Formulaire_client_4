<template>
       <sellerForm/>
       <hr>
        <userForm/>
</template>
<script>
import userForm from "./UserForm";
import sellerForm from "./sellerForm";
    export default {
                  name: 'App',
          components: {
                        'userForm':userForm,
                        'sellerForm':sellerForm,
                    },
    }
</script>
