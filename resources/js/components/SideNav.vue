<template>
    <div>

        {{ links }}
        <ul id="sidenav-left" class="sidenav sidenav-fixed  gray">

            <li><a href="/" class="logo-container">Writers Wiki<i class="material-icons left">widgets</i></a></li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold waves-effect active"><a class="collapsible-header">Pages<i class="material-icons chevron">chevron_left</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="/home" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                                <li><a href="#" class="waves-effect">Emotions<i class="material-icons">star</i></a></li>
                                <li><a href="#" class="waves-effect">Action Beats<i class="material-icons">star</i></a></li>
                                <li><a href="#" class="waves-effect">Descriptions<i class="material-icons">star</i></a></li>

                            </ul>
                        </div>
                    </li>

                    <li v-for="(key, value) in links" class="bold waves-effect"><a class="collapsible-header">{{ value.Name }}<i class="material-icons chevron">chevron_left</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a v-bind:href="'\all-'+ value.Name + 's'" class="waves-effect">All {{ value.Name }}s<i class="material-icons">videocam</i></a></li>
                            </ul>
                        </div>
                    </li>


                </ul>
            </li>

        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {

            this.loadData();
            console.log(this.links);
        },
        data : function (){

            return {

                links: []


            }

        },

        methods: {

            loadData() {

                var vm = this;

                let url = '/api/media-link-types/';

                axios
                        .get(url)
                        .then(response => (vm.links = response.data));


            },


        }
    }
</script>
