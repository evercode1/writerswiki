<template>

   <div class="container">

       <div class="center">


           <h3 class="flow-text grey-text text-darken-1">Contributed by <a v-bind:href="'/profile/' + profile">{{ username }}</a></h3>
           <img v-bind:src="thumb" height="42" width="42">


       </div>

        <div class="center">

            <p>{{ tagline }}</p>

        </div>




       <div class="mb-20"><a v-bind:href="'profile/' + profile">Visit {{ username }}'s profile</a></div>




   </div>



</template>



<script>

    export default {

       props: ['userid', 'username', 'profile', 'thumb', 'tagline'],

       mounted: function () {


                this.loadData();



       },

       data: function () {
          return {

             info: null,


          }
       },

        methods: {


            loadData() {

                let url = '/api/signature-data/' + this.userid ;


                axios
                        .get(url)
                        .then(response => (this.info = response.data));



            }





        }





    }





</script>