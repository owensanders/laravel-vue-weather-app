<template>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Weather-Checker</h1>
            <p>Check the weather for any country worldwide, click 'Weather Report' on one of our existing cities.
                Or add a new city by clicking the 'Add City' button.
            </p>
            <new-city-form />
        </div>
    </div>
</template>

<script>

import NewCityFormComponent from "./NewCityFormComponent.vue";

export default {
    components: {'new-city-form': NewCityFormComponent}
}
</script>
