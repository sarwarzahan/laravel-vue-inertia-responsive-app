<template>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5 shadow-sm p-4 bg-white rounded">
            <div class="form-row color-cool-gray font-weight-600 font-size-12">
                <div class="col">
                    <p class="text-uppercase">Seller Application</p>
                </div>
                <div class="col">
                    <p class="text-right text-uppercase">Step {{formStep.step}} of 2</p>
                </div>
            </div>
            <form method="post" @submit.prevent="submit">
                <errors-and-messages :errors="errors"></errors-and-messages>
                <div v-if="formStep.step === 1">
                    <h4 class="text-left font-weight-600">Share your work with us</h4>
                    <p class="font-weight-400 font-size-16">
                        To ensure the the quality of our marketplace, we limit our seller community to 
                        the most qualified creators. Let our curators know why you’d be a great seller:
                    </p>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="title" class="font-weight-600 font-size-14">First Name</label>
                            <input type="text" class="form-control font-size-16" name="first-name" id="first-name" v-model="form.firstName" />
                        </div>
                        <div class="form-group col">
                            <label for="title" class="font-weight-600 font-size-14">Last Name</label>
                            <input type="text" class="form-control font-size-16" name="last-name" id="last-name" v-model="form.lastName" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop-category" class="font-weight-600 font-size-14">Your Shop Category</label>
                        <select class="form-control font-size-16" id="shop-category" v-model="form.shopCategory">
                            <option disabled value="">Select Category</option>
                            <option v-for="shopCategory in shopCategories" v-bind:value="shopCategory.id">
                                {{ shopCategory.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="portfolio-link" class="font-weight-600 font-size-14">Portfolio Link</label>
                        <input type="text" class="form-control font-size-16" name="portfolio-link" id="portfolio-link" v-model="form.portfolioLink" />
                    </div>
                    <div class="form-group" v-if="form.portfolioLink != ''">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="portfolio-confirm" v-model="form.portfolioConfirm">
                          <label class="custom-control-label font-weight-400 font-size-16" for="portfolio-confirm">Yes, I confirm that the content I submit is authored by me.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="online-store-radio" class="font-weight-600 font-size-14">Do you already have an online store?</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="online-store-yes" id="online-store-yes" value="1" v-model="form.onlineStoreQues">
                            <label class="custom-control-label font-weight-400 font-size-16" for="online-store-yes">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="online-store-no" id="online-store-no" value="0" v-model="form.onlineStoreQues">
                            <label class="custom-control-label font-weight-400 font-size-16" for="online-store-no">No</label>
                        </div>
                    </div>
                    <div class="form-group" v-if="form.onlineStoreQues === '1'">
                        <label for="online-store-sell" class="font-weight-600 font-size-14">Online stores I sell on today</label>
                        <textarea id="online-store-sell" placeholder="Enter urls" name="online-store-sell" class="form-control font-size-16" v-model="form.onlineStores"></textarea>
                    </div>
                    <div class="form-row font-weight-600 font-size-18">
                        <div class="form-group col">
                            
                        </div>
                        <div class="form-group col">
                            
                        </div>
                        <div class="form-group col-md-3">
                            <button @click.prevent="formNext()" class="btn btn-primary btn-block">Next</button>
                        </div>
                    </div>
                </div>
                <div v-if="formStep.step === 2">
                    <h4 class="text-left font-weight-400">Tell us a little about yourself</h4>
                    <p class="font-weight-600 font-size-16">
                        Your answers will help us provide you with a more personalized experience as a seller!
                    </p>
                    <div class="form-group">
                        <label for="perspective-quality" class="font-weight-600 font-size-14">When creating products to sell, which best describes your perspective on quality?</label>
                        <select class="form-control font-size-16" id="perspective-quality" v-model="form.perspectiveQuality">
                            <option disabled value="">Select Answer</option>
                            <option v-for="perspectiveQuality in perspectiveQualities" v-bind:value="perspectiveQuality.id">
                                {{ perspectiveQuality.option }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="seller-experience" class="font-weight-600 font-size-14">How would you describe your experience level as an online seller?</label>
                        <select class="form-control font-size-16" id="seller-experience" v-model="form.sellerExperience">
                            <option disabled value="">Select Answer</option>
                            <option v-for="sellerExperience in sellerExperiences" v-bind:value="sellerExperience.id">
                                {{ sellerExperience.option }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="business-marketing" class="font-weight-600 font-size-14">How would you describe your understanding of business and marketing?</label>
                        <select class="form-control font-size-16" id="business-marketing" v-model="form.businessMarketing">
                            <option disabled value="">Select Answer</option>
                            <option v-for="businessMarketing in businessMarketings" v-bind:value="businessMarketing.id">
                                {{ businessMarketing.option }}
                            </option>
                        </select>
                    </div>
                    <div class="form-row flex-column-reverse flex-md-row font-weight-600 font-size-18">
                        <div class="form-group col text-center text-md-left">
                            <a href="#" @click.prevent="formPrev()"><i class="fas fa-angle-left p-2"></i>Back</a>
                        </div>
                        <div class="form-group col">
                            
                        </div>
                        <div class="form-group col-md-3">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit Application" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {computed, inject, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "Application",
    components: {
        ErrorsAndMessages
    },
    props: {
        errors: Object
    },
    setup(props) {
        const form = reactive({
            firstName: null,
            lastName: null,
            shopCategory: "",
            portfolioLink: "",
            onlineStoreQues: null,
            onlineStores: "",
            perspectiveQuality: "",
            sellerExperience: "",
            businessMarketing: "",
            _token: usePage().props.value.csrf_token
        });
        
        const shopCategories =  usePage().props.value.shopCategories;
        const perspectiveQualities = usePage().props.value.perspectiveQualities;
        const sellerExperiences = usePage().props.value.sellerExperiences;
        const businessMarketings = usePage().props.value.businessMarketings;

        const formStep = reactive({ step: 1 });
        function formNext() {
            formStep.step++; 
        }
        function formPrev() {
            formStep.step--; 
        }

        function submit() {
            let isValidData = true;
            // Clear existing errors
            for (const prop of Object.getOwnPropertyNames(props.errors)) {
              delete props.errors[prop];
            }
            if (!form.firstName) {
                props.errors["firstName"] = 'First Name is required.';
                isValidData = false;
            }
            if (!form.lastName) {
                props.errors["lastName"] = 'Last Name is required.';
                isValidData = false;
            }
            if (!form.shopCategory) {
                props.errors["shopCategory"] = 'Please select shop category.';
                isValidData = false;
            }
            if (form.portfolioLink) {
                try {
                    new URL(form.portfolioLink);
                    if (!form.portfolioConfirm) {
                        props.errors["portfolioConfirm"] = 'Please confirm that the content you submit is authored by you.';
                        isValidData = false;
                    }
                } catch (e) {
                    props.errors["portfolioLink"] = 'Please enter valid Portfolio Link.';
                    isValidData = false;
                }
            }
            if (form.onlineStoreQues === "1") {
                if (!form.onlineStores) {
                    props.errors["onlineStores"] = 'Please enter online stores you sell.';
                    isValidData = false;
                }
            }
            if (!form.perspectiveQuality) {
                props.errors["perspectiveQuality"] = 'Please select your perspective on quality.';
                isValidData = false;
            }
            if (!form.sellerExperience) {
                props.errors["sellerExperience"] = 'Please select your experience level as an online seller.';
                isValidData = false;
            }
            if (!form.businessMarketing) {
                props.errors["businessMarketing"] = 'Please select your understanding of business and marketing.';
                isValidData = false;
            }
            
            if(!isValidData) {
                return false;
            }
            Inertia.post(route('application.store'), form, {
                forceFormData: true
            });
        }

        return {
            form, formStep, formNext, formPrev, submit, shopCategories, perspectiveQualities, sellerExperiences, businessMarketings
        }
    }
}
</script>

<style scoped>
    h2 {
        margin-bottom: 2rem;
    }
</style>
