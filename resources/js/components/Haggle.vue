<template>

    <div class="container">

        <!-- reset button -->

        <h1 class="flow-text"><a href="/haggle"><button class="btn-small">Reset</button></a></h1>

        <!-- end reset button -->

        <!-- show meta data -->

            <div class="mt-20" v-if="showFullHistory === 0">

                <button @click="showMetaHistory()" class="btn-small">Show Meta Data</button>

            </div>  <!-- end meta data button -->

        <!-- hide meta data -->

            <div v-if="showFullHistory === 1">

                <button @click="hideMetaHistory()" class="btn-small">Hide Meta Data</button>

            </div>  <!-- end hide meta data -->


        <!-- User block -->

        <div class="row mt-20">

        <ul>
        <li>User Id: {{ userData.userId }} </li>
        <li>Username: {{ userData.userName }}</li>
        <li>Item Id:  {{ scenarioData.itemId }}</li>
        <li>Item Description:  {{ scenarioData.itemDescription }}</li>
        </ul>

        </div>  <!-- end User block-->

        <!-- begin row with offer history -->

        <div class="row mt-20">

            <!-- show offer history -->

             <div  v-if="showFullHistory === 1 && loader === 0">

                        <div class="row mt-20">Offer History</div>

                <ul>

                    <li v-for="counter in counterData">Offer:  ${{ counter.offer }} is a {{ counter.offerQuality }} offer - The Counter Offer is: ${{ counter.counterOffer }} </li>

                </ul>


            </div><!-- end full offer history -->

            <!-- show loader in full offer history -->

            <div v-if="loader === 1 && showFullHistory === 1">

                <p>Thinking about your offer of ${{ currentOffer }}...</p>
                <div class="loader"></div>

            </div>  <!-- end loader with full history and meta data -->

            <!-- show offer info without full history -->

            <div  v-if="showFullHistory === 0">

                <!-- show loader without full history -->

                <div v-if="loader === 1">

                    <p>Thinking about your offer of ${{ currentOffer }}...</p>

                <div class="loader"></div>

                </div>  <!-- end loader without full history and meta data -->

                <!-- show last counter offer if declined -->

                <div v-if="declined === 1">


                    <!-- previous offer -->

                    <div v-if="counterOffer > 0 && counterOffer !== currentOffer">

                        <ul>

                            <li >The Last Counter Offer was: ${{ counterOffer }} </li>

                        </ul>

                    </div>  <!-- end previous offer history -->

                </div>  <!-- end if declined -->

            </div>  <!-- end loader and previous offer without full history -->

        </div>  <!-- end row with offer history -->

        <!-- show if scenario not set -->

        <div v-if="scenarioData.cost > 0">

        <!-- show if counter offer doesn't match offer -->

        <div v-if="isCounterOfferMatchedToUserOffer === 0">

            <!-- counter offer block -->

                <div v-if="declined === 0">

                    <!-- show final offer -->

                    <div class="row" v-if="isCounterOfferFinal === 0 && loader === 0">

                        <div>Our Offer: ${{ counterOffer }} </div>

                    </div>


                    <!-- show accept/decline buttons -->

                        <div v-if="loader ===0">

                            <div class="row" v-if="counterOffer > 0  && payMessage === 0 && isCounterOfferFinal !== 1">

                                <button @click="accept()" class="btn-small">Accept</button>
                                <button @click="decline()" class="btn-small">Decline</button>

                            </div>

                        </div>  <!-- end accept/decline buttons -->

               </div>  <!-- end counter offer block -->

        <div class="row" v-if="isCounterOfferFinal === 0  && payMessage === 0 && declined === 1">

            <div class="left mt-20">

                  Make Offer:

                <input v-model="newOffer" class="number-input">

                <button @click="offer(newOffer, currentOffer)" class="btn-small">Offer</button>

            </div>


        </div> <!-- end make offer form -->


        <div class="red-text"   v-if="offerError === 1">

            {{ errorMessage }}

        </div> <!-- end error block -->


        <div class="row" v-if="isCounterOfferFinal !== 0 && payMessage === 0 && loader === 0">

            <div>

                    Our final offer is ${{ counterOffer }}

                        <div class="mt-20">
                            <button @click="accept(counterOffer)" class="btn-small">Accept</button>
                            <button @click="decline()" class="btn-small">Decline</button>

                        </div>

            </div>

        </div>  <!-- end final offer block -->

            <div class="row" v-if="payMessage !== 0 && loader === 0">

                <div class="row"><a href="#">{{ payMessage }} ${{ counterOffer }}</a></div>

                <div class="row mt-20"><button class="btn-small">Pay Now</button></div>

            </div>

        </div>  <!-- end if offer not matched -->

        </div>  <!-- end if scenario set -->

        <div v-if="isCounterOfferMatchedToUserOffer === 1 && loader === 0">

            <div class="row"><a href="#">{{ acceptMessage }} ${{ counterOffer }}</a></div>

            <div class="row mt-20"><button class="btn-small">Pay Now</button></div>

        </div>  <!-- end accepted offer block -->

        <div class="row" v-if="showForm">

            <div class="row">Choose Scenario to Start: {{ scenario }}</div>

            <div class="row">
            <div class="input-field col 4">
                <select v-model="scenario"  class="browser-default">
                    <option disabled value="">Please select one</option>
                    <option>Newbie</option>
                    <option>Purchaser</option>
                    <option>Spender</option>
                    <option>Reseller</option>
                </select>

            </div>
            </div>


            <div class="row">

                <button @click="getScenarioData(scenario)" class="btn-small">Get Scenario</button>

            </div>



        </div>  <!-- end show scenario form -->


        <div v-if="showFullHistory === 1" class="row mt-100">

            <h1 class="flow-text">Offer Meta Data</h1>

            <ul>
                <li>scenario:  {{ scenarioData.scenario }}</li>
                <li>site id:  {{ scenarioData.siteId }}</li>
                <li>buyer type:  {{ userData.buyerType }}</li>
                <li>item cost:  ${{ scenarioData.cost }}</li>
                <li>high price:  ${{ scenarioData.highPrice }}</li>
                <li>optimum price:  ${{ scenarioData.optimumPrice }}</li>
                <li>maximum price:  ${{ scenarioData.maximumPrice }}</li>
                <li>purchaser price:  ${{ scenarioData.purchaserPrice }}</li>
                <li>spender price:  ${{ scenarioData.spenderPrice }}</li>
                <li>reseller price:  ${{ scenarioData.resellerPrice }}</li>
                <li>bottom price:  ${{ scenarioData.bottomPrice }}</li>
                <li>volume price:  ${{ scenarioData.volumePrice }}</li>
                <li>allowed offers Count:  {{ scenarioData.allowedOffersCount }}</li>
                <li>selling mode: {{ scenarioData.sellingMode }}</li>
                <li>description:  {{ userData.description }}</li>

            </ul>


        </div>  <!-- end meta data -->


    </div> <!-- end container -->

</template>

<script>

    const newbieData = require('../scenarios/NewbieData');
    const purchaserData = require('../scenarios/PurchaserData');
    const spenderData = require('../scenarios/SpenderData');
    const resellerData = require('../scenarios/ResellerData');
    const newbie = require('../users/Newbie');
    const purchaser = require('../users/Purchaser');
    const reseller = require('../users/Reseller');
    const spender = require('../users/Spender');

    export default {
        name: "Haggle",

        props: ['newbieData',
                'purchaserData',
                'spenderData',
                'resellerData',
                'newbie',
                'purchaser',
                'reseller',
                'spender'],

        data: function () {
            return {

                acceptMessage: 'Congratulations, you won for ',
                cost: 0,
                counterData: [],
                counterOffer: 0,
                currentOffer: 0,
                description:  null,
                declined: 1,
                errorMessage:  'Your offer must be higher than your last offer.',
                isCounterOfferFinal: 0,
                isCounterOfferMatchedToUserOffer: 0,
                loader: 0,
                newOffer: null,
                offerData: [],
                offerError: 0,
                offerQuality: null,
                optimumPrice: null,
                payMessage: 0,
                showForm: 1,
                showFullHistory: 0,
                scenario: null,
                scenarioData: [],
                userData: []


            }
        },

        methods: {

            offer: function (newOffer, currentOffer) {

                if(Number(newOffer) > Number(currentOffer) && ! isNaN(newOffer)){

                    newOffer = Number(newOffer);

                    this.offerError = 0;
                    this.currentOffer = newOffer;
                    this.offerData.push(newOffer);
                    this.makeCounterOffer(newOffer);
                    this.newOffer = '';
                    this.declined = 0;

                }else{

                    this.offerError = 1;
                    this.newOffer = '';

                }

            },



            makeCounterOffer:  function (offer){



                    axios.get('/haggle-data', { params: { offer: offer,
                                                          itemId: this.scenarioData.itemId,
                                                          itemDescription: this.scenarioData.itemDescription,
                                                          scenario: this.scenarioData.scenario,
                                                          siteId: this.scenarioData.siteId,
                                                          cost: this.scenarioData.cost,
                                                          highPrice: this.scenarioData.highPrice,
                                                          optimumPrice: this.scenarioData.optimumPrice,
                                                          maximumPrice: this.scenarioData.maximumPrice,
                                                          purchaserPrice: this.scenarioData.purchaserPrice,
                                                          spenderPrice: this.scenarioData.spenderPrice,
                                                          resellerPrice: this.scenarioData.resellerPrice,
                                                          bottomPrice:  this.scenarioData.bottomPrice,
                                                          volumePrice: this.scenarioData.volumePrice,
                                                          allowedOffersCount: this.scenarioData.allowedOffersCount,
                                                          sellingMode: this.scenarioData.sellingMode,
                                                          userId: this.userData.userId,
                                                          buyerType: this.userData.buyerType

                                               }}).then( (response) => {

                        this.loader = 1;

                        setTimeout(() => { this.loader = 0;  }, 2500);

                        this.counterOffer = response.data.counterOffer;

                        this.offerQuality = response.data.offerQuality;

                        this.isCounterOfferFinal = response.data.isCounterOfferFinal;

                        this.isCounterOfferMatchedToUserOffer = response.data.isCounterOfferMatchedToUserOffer;

                        this.counterData.push(response.data);

                    });


            },

            accept:  function (){

                this.isCounterOfferFinal = 1;



                axios.get('/haggle-accept-offer',
                    { params: { counterOffer: this.counterOffer, itemId: this.scenarioData.itemId, userId: this.scenarioData.userId, siteId: this.scenarioData.siteId }})
                    .then( (response) => {

                    this.payMessage = 'Congratulations, you won for '

                });


            },

            decline:  function(){

                this.declined = 1;

            },

            getScenarioData: function(scenario){


                this.showForm =0;

                switch(scenario){

                    case 'Newbie' :

                        this.scenarioData = newbieData;
                        this.userData = newbie;
                        this.declined = 1;

                        break;

                    case 'Purchaser' :

                        this.scenarioData = purchaserData;
                        this.userData = purchaser;
                        this.declined = 1;

                        break;

                    case 'Spender' :

                        this.scenarioData = spenderData;
                        this.userData = spender;
                        this.declined = 1;

                        break;

                    case 'Reseller' :

                        this.scenarioData = resellerData;
                        this.userData = reseller;
                        this.declined = 1;

                        break;

                }





                axios.get('/haggle-clear-offers').then( (response) => {



                });



            },

            showMetaHistory:  function(){

                this.showFullHistory = 1;

            },

            hideMetaHistory:  function(){


                this.showFullHistory = 0;


            }

        }
    }
</script>
<style>

    .mt-20{

        margin-top: 20px;

    }

    .mt-50{

        margin-top:  50px;

    }

    .mt-100{

        margin-top:  100px;

    }

    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }


</style>

