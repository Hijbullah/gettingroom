<template>
  <section class="choose-package mt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-11 m-auto">
          <h1 class="p-3 mb-3 font-weight-normal text-center heading">Choose a package</h1>
          <div class="row">
            <div class="col-md-3">
              <div
                class="g-card font-20 text-center py-3 mb-4"
                :class="[selectedPlan == 310 ? 'active' : '']"
                @click="selectPlan(310)"
              >
                <div class="package-info">
                  <h2 class="display-4">1</h2>
                  <p class="font-20">days</p>
                  <p class="font-20">(24 hours)</p>
                </div>
                <hr />
                <p class="font-20 font-weight-bold text-success package-price">
                  <span>$</span>
                  0.00
                  <span>USD</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div
                class="g-card font-20 text-center py-3 mb-4"
                :class="[selectedPlan == 311 ? 'active' : '']"
                @click="selectPlan(311)"
              >
                <div class="package-info">
                  <h2 class="display-4">5</h2>
                  <p class="font-20">days</p>
                  <p class="font-20">(168 hours)</p>
                </div>
                <hr />
                <p class="font-20 font-weight-bold text-success package-price">
                  <span>$</span>
                  9.99
                  <span>USD</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div
                class="g-card font-20 text-center py-3 mb-4"
                :class="[selectedPlan == 312 ? 'active' : '']"
                @click="selectPlan(312)"
              >
                <div class="package-info">
                  <h2 class="display-4">15</h2>
                  <p class="font-20">days</p>
                  <p class="font-20">(240 hours)</p>
                </div>
                <hr />
                <p class="font-20 font-weight-bold text-success package-price">
                  <span>$</span>
                  24.99
                  <span>USD</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div
                class="g-card font-20 text-center py-3 mb-4"
                :class="[selectedPlan == 313 ? 'active' : '']"
                @click="selectPlan(313)"
              >
                <div class="package-info">
                  <h2 class="display-4">30</h2>
                  <p class="font-20">days</p>
                  <p class="font-20">(720 hours)</p>
                </div>
                <hr />
                <p class="font-20 font-weight-bold text-success package-price">
                  <span>$</span>
                  39.99
                  <span>USD</span>
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 m-auto">
              <div class="content text-center">
                <p class="font-22 p-md-4">
                  All packages unlock the
                  <span class="text-success">Getting Room mailbox</span>
                  <br />and
                  <span class="text-success">Getting Room Social Connect</span>
                </p>
                <button
                  class="btn btn-block btn-success my-3 py-2 font-22"
                  :disabled="disabled"
                  @click="continueToPay"
                >Continue</button>
                <p class="font-22 mb-5">
                  OR
                  <a class="text-success" href="/lists/offerrooms">Continue with Free Account</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      selectedPlan: null,
      disabled: true
    };
  },
  methods: {
    selectPlan(plan) {
      if (plan == this.selectedPlan) {
        this.selectedPlan = null;
        this.disabled = true;
      } else {
        this.selectedPlan = plan;
        this.disabled = false;
      }
    },
    continueToPay() {
      window.location.href = `/upgrade/plans/${this.selectedPlan}`;
    }
  },
  mounted() {
    console.log(this.plans);
  }
};
</script>

<style scoped>
.active {
  border: 2px solid green !important;
  background: #fff !important;
  color: #000 !important;
}
</style>
