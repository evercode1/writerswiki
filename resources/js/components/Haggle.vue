<template>

    <div class="container">

        <div class="row mt-20">

            <div>Offer History</div>

            <ul>

                <li v-for="row in offerData">  {{ row }}  </li>

            </ul>

            <div>Counter History</div>

            <ul>

                <li v-for="counter in counterData">  {{ counter }}  </li>

            </ul>


        </div>

        <div class="row center">Current Offer:  {{ currentOffer }}  <div>Counter Offer: {{ counterOffer }}</div></div>

        <div class="row">
            <div class="center mt-20">


                  Make Offer:
                <input v-model="currentOffer" class="number-input">

                <button @click="offer(currentOffer)" class="btn-small">Offer</button>

            </div>

        </div>

        <div class="row">

            <span>Scenario: {{ scenario }}</span>

            <div class="input-field col s12">
                <select v-model="scenario">
                    <option disabled value="">Please select one</option>
                    <option>Newbie</option>
                    <option>Purchaser</option>
                    <option>Reseller</option>
                </select>

            </div>


        </div>

        <div class="row">

            <ul>
                <li>item cost:  ${{ scenarioData.cost }}</li>
                <li>high price:  ${{ scenarioData.highPrice }}</li>
                <li>optimum price:  ${{ scenarioData.optimumPrice }}</li>
                <li>bottom price:  ${{ scenarioData.bottomPrice }}</li>
                <li>scenario:  {{ scenarioData.scenario }}</li>
                <li>description:  {{ scenarioData.description }}</li>

            </ul>

            <button @click="getScenarioData(scenario)" class="btn-small">Get Scenario</button>

        </div>







    </div>
    
</template>

<script>
    export default {
        name: "Haggle",

        data: function () {
            return {

                offerData: [],
                counterData: [],
                scenarioData: [],
                currentOffer: null,
                counterOffer: null,
                cost: null,
                highPrice: null,
                bottomPrice: null,
                optimumPrice: null,
                description:  null,
                scenario: null


            }
        },

        methods: {

            offer: function (offer) {
                this.currentOffer = offer;
                this.offerData.push(offer);
                this.makeCounterOffer(offer);

            },

            makeCounterOffer:  function (offer){



                    axios.get('/haggle-data', { params: { offer: offer, scenario: this.scenario }}).then( (response) => {

                        this.counterOffer = response.data;

                        this.counterData.push(response.data);

                    });





            },

            getScenarioData: function(scenario){

                axios.get('/haggle-scenario?scenario=' + scenario).then( (response) => {

                    this.scenarioData = response.data;


                });

            },

            setCost: function(cost){

               this.cost = cost;

            },

            setHighPrice: function(highPrice){

                this.highPrice = highPrice;

            },

            setOptimumPrice: function(optimumPrice){

                this.optimumPrice = optimumPrice;

            },

            setBottomPrice: function(bottomPrice){

                this.bottomPrice = bottomPrice;

            }

        }
    }
</script>

