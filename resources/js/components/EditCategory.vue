<template>
    <div>


        <!-- Category Select Form -->


        <div class="mb-20 mt-20">

            <div class="mb-10">

                <label>Category</label>

            </div>

            <select  @change="onChange($event.target.value)" name="category_id" class="browser-default">

                <option value="">Please Choose One</option>

                <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>

            </select>


        </div>

        <!-- Subcategory Select Form -->

        <div v-show="current > 0">

            <div class="mb-10">

                <label>Subcategory</label>

            </div>

            <select v-model="defaultOption"  name="subcategory_id" class="browser-default">

                <option value="0">Please Choose One</option>

                <option v-for="subcategory in subcategories"
                        v-bind:value=" subcategory.id ">{{ subcategory.name }}</option>

            </select>


        </div>

    </div>

</template>

<script>

    export default {


        mounted: function () {

            this.loadData();

        },

        data: function () {
            return {

                current : '',

                categories : [],

                subcategories: [],

                defaultOption: 0


            }
        },



        methods: {

            loadData() {

                var vm = this;

                let url = '/api/categories-for-dropdown/';

                axios
                        .get(url)
                        .then(response => (vm.categories = response.data));


            },

            loadSubcategories (value) {

                console.log(value);

                var vm = this;

                let url = '/api/subcategories-for-dropdown/' + value;


                axios
                        .get(url)
                        .then(response => (vm.subcategories = response.data));

            },

            onChange (value) {



                this.current = value;


                this.defaultOption = 0;


                this.loadSubcategories(value);

            }


        }



    }

</script>