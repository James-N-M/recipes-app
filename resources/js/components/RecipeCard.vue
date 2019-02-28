<template>
    <div class="px-3 pb-6">
        <div class="bg-white flex flex-col justify-between p-5 rounded-lg shadow" style="height: 200px">
            <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-light pl-4">
                <a class="no-underline text-black" href="#">{{this.recipe.name}}</a>
            </h3>

            <div class="text-grey-dark">{{ this.recipe.description }}</div>
            <div>
                <form method="POST" @change="changeRecipeDifficulty" ref="form">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="1" v-model="recipe.difficulty" />
                        <input type="radio" id="star4" name="rating" value="2" v-model="recipe.difficulty" />
                        <input type="radio" id="star3" name="rating" value="3" v-model="recipe.difficulty" />
                        <input type="radio" id="star2" name="rating" value="4" v-model="recipe.difficulty" />
                        <input type="radio" id="star1" name="rating" value="5" v-model="recipe.difficulty" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
          recipe: {
              name: '',
              description: '',
              difficulty: '',
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            changeRecipeDifficulty() {
                axios.post(`/recipes/${this.recipe.id}`, {
                    difficulty: this.recipe.difficulty,
                }).then((response) => {
                    console.log("this is the difficulty passed:" +   difficulty);
                    this.difficulty = difficulty;
                });
            }
        }
    }
</script>
