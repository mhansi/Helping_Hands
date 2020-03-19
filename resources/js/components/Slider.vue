<template>
<hooper> 
    <slide>
        Slide 1
    </slide>
       <slide>
        Slide 2
    </slide>
       <slide>
        Slide 3
    </slide>
</hooper>
</template>

<script>
import { Hooper, Slide } from 'hooper';
import 'hooper/dist/hooper.css';
export default {
  name: 'App',
  components: {
    Hooper,
    Slide
  }
    
}
</script>