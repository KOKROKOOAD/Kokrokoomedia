<template>
    <div class="jumbotron text-center">
        <h6 class="display-3" style="font-size:38px;font-weight:bolder">Thank You for using our advertising platform!</h6>
        <p class="lead"><strong>Your subscription is successfully created.A receipt </strong>  of your purchase has been sent to your email.</p>
        <hr>
        <p>
            Have any questions? <a href="">Contact us :  suport@kokrokoo.com</a>
        </p>
        <p class="lead">
            <router-link :to="{name: 'selectMedia'}" class="btn btn-primary btn-sm" role="button">Create another advert</router-link>
            <router-link :to="{name:'subs'}" class="btn btn-primary btn-sm"  role="button">View subscriptions</router-link>

        </p>
    </div>
</template>

<script>
    export default {
        name: "success"
    }
</script>

<style scoped>

</style>