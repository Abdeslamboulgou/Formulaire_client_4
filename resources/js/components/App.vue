<template>

    <div class="container">

        <br>
        <router-view/>
    </div>
</template>
 
<script>

    import Accordion from './Accordion';
    import AdminInterface from './AdminInterface'
    import "./../../sass/_accordion.scss"; 
    import "./../../sass/_sellerForm.scss"; 
    import "./../../sass/_userForm.scss"; 

    export default {
          name: 'App',
          components: {
                        'AdminInterface':AdminInterface,
                        'Accordion': Accordion,

                    }               
}
    

</script>