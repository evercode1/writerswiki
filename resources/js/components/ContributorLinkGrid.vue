<template>

    <div class="row">



        <h1 class="flow-text grey-text text-darken-1">ContributorLink</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section class="mt-20">


                <div class="row">

                    <table>

                        <table-head></table-head>

                        <tbody>

                        <tr v-for="row in gridData">

                            <td>

                                   {{ row.Id }}

                            </td>

                            <td>

                                <a v-bind:href="'/contributor-link/' + row.Id"> {{ row.Name }}</a>

                            </td>

                            <td><a v-bind:href="'/contributor-link-type/' + row.ContributorLinkTypeId">{{ row.ContributorLinkType }}</a></td>

                            <td>

                                {{ row.User }}

                            </td>

                            <td>

                                   {{ row.Created }}

                            </td>

                            <td >

                                <a v-bind:href="'/contributor-link/' + row.Id + '/edit'">

                                <button type="button" class="waves-effect waves-light btn mt-5">

                                        Edit

                                </button>

                                </a>


                                <button class="waves-effect waves-light btn mt-5"
                                        @click="confirmDelete(row.Id)">

                                        Delete

                                </button>



                            </td>

                        </tr>

                        </tbody>

                    </table>

                </div>

                <page-number></page-number>

            </section>

            <pagination></pagination>



    </div>

</template>

<script>

    var gridData = require('../utilities/gridData');

        import Pagination from './Pagination';
        import SearchBox from './SearchBox';
        import GridCount from './GridCount';
        import PageNumber from './PageNumber';
        import TableHead from './TableHead';


    export default {

        components: {'pagination' : Pagination,
                     'search-box' : SearchBox,
                     'grid-count' : GridCount,
                     'page-number' : PageNumber,
                     'table-head' : TableHead },

        mounted: function () {

            gridData.loadData('/api/contributor-link-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Name', 'ContributorLinkType', 'User', 'Created'],
                gridData: [],
                total: null,
                next_page_url: null,
                prev_page_url: null,
                last_page: null,
                current_page: null,
                pages: [],
                first_page_url: null,
                last_page_url: null,
                go_to_page: null,
                sortOrder: 1,
                sortKey: 'id',
                createUrl: '/contributor-link/create',
                showCreateButton: true
            }
        },

        methods: {

            sortBy: function (key){
                this.sortKey = key;
                this.sortOrder = (this.sortOrder == 1) ? -1 : 1;
                this.getData(1);
            },

            search: function(query){
                this.getData(query);
            },


            getData:  function(request){

                gridData.getQueryData(request, '/api/contributor-link-data', this);

            },

            setPageNumbers: function(){

                this.pages = [];

                for (var i = 1; i <= this.last_page; i++) {
                    this.pages.push(i);
                }
            },

            checkPage: function(page){
                return page == this.current_page;
            },

            resetPageNumbers: function(){

                this.setPageNumbers();
            },

            checkUrlNotNull: function(url){

                return url != null;

            },

            clearPageNumberInputBox: function(){

                return this.go_to_page = '';

            },

            pageInRange: function(){

                return this.go_to_page <= parseInt(this.last_page);

            },

                formatActive: function(active){

                    return  active === 1 ? 'Active' : 'Inactive';

            },

            confirmDelete: function(id){

                if(confirm("Are you sure you want to delete?")){

                    axios.post('/contributor-link-delete/' + id)
                            .then(response => {

                                gridData.loadData('/api/contributor-link-data', this);

                            });


                }



            }


        }

    }

</script>