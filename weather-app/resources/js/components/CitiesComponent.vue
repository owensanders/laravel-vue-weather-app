<template>
    <div class="container w-75 mt-5 rounded">
        <div class="container">
            <div class="row">
                <div v-for="city in this.currentWeather" class="col-sm-6 mt-1 mb-1">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{city.name}}</h5>
                            <p class="card-text">Current Temperature: {{city.main.temp}}</p>
                            <p class="card-text">Weather Description: {{city.weather[0].description}}</p>
                            <div class="btn-group">
                                <button @click="getFiveDayWeather(city.name)" class="btn btn-primary me-1">5 day report</button>
                                <button @click="removeCity(city.name)" class="btn btn-danger">Delete City</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 v-if="weeklyWeather.length" v-text="cityName"></h1>
        <p v-if="weeklyWeather.length">5 day weather report per 3 hours time period.</p>
        <table v-if="weeklyWeather.length" class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Date and Time</th>
                <th scope="col">Weather Description</th>
                <th scope="col">Average Temperature</th>
                <th scope="col">Minimum Temperature</th>
                <th scope="col">Maximum Temperature</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="weeklyData in weeklyWeather">
                <td></td>
                <td>{{weeklyData.dt_txt}}</td>
                <td>{{weeklyData.weather[0].description}}</td>
                <td>{{weeklyData.main.temp}}</td>
                <td>{{weeklyData.main.temp_min}}</td>
                <td>{{weeklyData.main.temp_max}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                cities: [],
                currentWeather: [],
                weeklyWeather: [],
                cityName: null,
            }
        },
        methods: {
            async getCities() {
                const response = await axios.get('/cities');
                this.cities = await response.data;

                for (const city of this.cities) {
                   let cityData = await this.getCityWeather(city.name);

                   if (cityData.length === 0) {
                       return;
                   }

                   this.currentWeather.push(cityData);
                }
            },
            async getCityWeather(city) {
                const response = await axios.get('/weather/' + city);

                return await response.data;
            },
            async getFiveDayWeather(city) {
                this.weeklyWeather = [];
                this.cityName = city;
                const response = await axios.get('/weather/weekly/' + city);
                this.weeklyWeather = response.data.list;
                console.log(response.data);
            },
            async removeCity(name) {
                const response = await axios.post('/city/' + name + '/delete');

                if (response.status === 200) {
                    window.location.reload();
                }
            },
        },
        mounted() {
            this.getCities();
        }
    }
</script>
