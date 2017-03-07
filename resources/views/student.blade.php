<div class="col-xs-6 col-sm-4 col-md-4" v-if="students[0]" v-cloak>
    <img :src="'<?php echo URL::asset('imgs/students') ?>/' + students[<?php echo $id ?>].uid + '.jpg'" :alt="students[<?php echo $id ?>].name" class="img-thumbnail"/>
    <!--<img :src="'https://graph.facebook.com/'+ students[<?php echo $id ?>].fbId +'/picture/picture?type=large'" :alt="students[<?php echo $id ?>].name" class="img-thumbnail"/>-->
    <h3 v-html="format(students[<?php echo $id ?>].name)"></h3>
    <h4>{{ students[<?php echo $id ?>].promotion }}</h4>
    <h2>
        <i :class="'fa fa-' + (students[<?php echo $id ?>].sex == 'M' ? 'mars' : 'venus')" aria-hidden="true"></i>
        <a :href="'https://facebook.com/' + students[<?php echo $id ?>].fbId" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </h2>
    <button @click="vote({{ $id }})" type="button" class="btn btn-primary btn-block choose">VOTER</button>
</div>
