<template xmlns="http://www.w3.org/1999/html">
    <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#newCityModal">Add City</button>

        <div class="modal fade" id="newCityModal" tabindex="-1" role="dialog" aria-labelledby="newCityLabel" aria-hidden="true" @click="resetForm">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCityModalLabel">New City</h5>
                        <button @click="resetForm" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="error">
                            <p class="text-danger">{{ error }}</p>
                        </div>
                        <p>Please ensure the city is valid, otherwise a report will not be generated.</p>
                        <form>
                            <div class="form-group">
                                <label for="cityName">City Name</label>
                                <input v-model="cityName" type="text" class="form-control" id="cityName" aria-describedby="cityHelp" placeholder="Enter the city name">
                            </div>
                            <button @click.prevent="addCity" type="submit" class="btn btn-primary mt-3">Add City</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cityName: '',
                error: null
            }
        },

        methods: {
            async addCity() {
                this.error = null;

                try {
                    const response = await axios.post('/new-city', {
                        'name': this.cityName
                    });

                    if (response.status === 200) {
                        this.resetForm();
                        window.location.reload();
                    }
                } catch (e) {
                    this.error = e.response.data.errors['name'][0];
                }
            },
            resetForm() {
                this.error = null;
                this.cityName = null;
            }
        }
    }
</script>
