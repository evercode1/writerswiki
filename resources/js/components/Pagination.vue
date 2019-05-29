<template>
    <div class="container">

        <div class="row mt-20">

        <div class="left mt-50" v-show="$parent.showCreateButton"> <a v-bind:href="$parent.createUrl">

            <button type="button" class="waves-effect waves-light btn">

                Create New

            </button>


        </a>

        </div>

        </div>

        <div class="row">


            <div class="col-md-4 col-md-offset-2"v-show="$parent.total > 5">


            <ul class="pagination center">
                <li><a @click.prevent="$parent.getData($parent.first_page_url)"> first </a></li>
                <li v-if="$parent.checkUrlNotNull($parent.prev_page_url)">
                    <a @click.prevent="$parent.getData($parent.prev_page_url)" >prev</a>
                </li>
                <li v-for="page in $parent.pages"
                    v-if="page > $parent.current_page - 2 && page < $parent.current_page + 2"
                    v-bind:class="{'active': $parent.checkPage(page)}">
                    <a @click.prevent="$parent.getData(page)">{{ page }}</a>
                </li>
                <li v-if="$parent.checkUrlNotNull($parent.next_page_url)">
                    <a @click.prevent="$parent.getData($parent.next_page_url)">next</a>
                </li>
                <li><a @click.prevent="$parent.getData($parent.last_page_url)"> last </a></li>
            </ul>
        </div>

            <div class="col-md-4 col-md-offset-2"v-show="$parent.total > 5">

            <div class="row">
                <div class="right mt-20">

                    <button @click="$parent.getData($parent.go_to_page)"class="btn-small">
                        Go To Page:</button>
                    <input v-model="$parent.go_to_page" class="number-input"></input>

                </div>

            </div>

            </div>
    </div>

    </div>
</template>

