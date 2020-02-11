<template>
    <div class="container">
        <div class="intro">
        <h1>hello I make</h1>
        <h1 class="typing">hi</h1>
    </div>

    </div>
</template>

<script>
    export default {
        data() {
       
        text:['website','illustrations','pancakes']
        count:0
        index:0
        currentText:''
        letter:''
    },
        methods: {
           

       type(){
    if(count===texts.lenght){
        count=0;
    }
    currentText = texts[count];
    letter =currentText.slice(0, ++index);

    document.querySelector('.typing').textContent=letter;
    if(letter.length===currentText.length){
        count++;
        index=0;
    }

    setTimeout(type,400);
}
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
