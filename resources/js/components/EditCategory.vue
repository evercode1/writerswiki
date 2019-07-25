<template>
    <div>

        <!-- Category Select Form -->


        <div class="mb-20 mt-20">

            <div class="mb-10">

                <label>Category</label>

            </div>

            <select  @change="onChange($event.target.value)" name="category" class="browser-default">

                <option :value="oldcat.id">{{ oldcat.name }}</option>

                <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>

            </select>


        </div>

        <!-- Subcategory Select Form -->

        <div>

            <div class="mb-10">

                <label>Subcategory</label>

            </div>

            <select  name="subcategory" class="browser-default">

                <option :value="oldsub.id">{{ oldsub.name }}</option>

                <option v-for="subcategory in subcategories"
                        v-bind:value=" subcategory.id ">{{ subcategory.name }}</option>

            </select>


        </div>

    </div>

</template>

<script>

    export default {

        props:  ['oldsub', 'oldcat'],


        mounted: function () {

            this.loadData();
            this.loadSubcategories(oldcat);

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