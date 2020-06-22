<div class="book">
  <div class="cover">
     <?php print render($content['field_libro_portada']) ?>
  </div><!-- /cover -->
  <div class="visible-xs-block">
    <h1><?php print $node->title ?></h1>
    <p>
      De <?php print $content['autores'] ?>
    </p>
  </div>  
  <div class="buy">
    <p class="price"><?php print $content['product:commerce_price'][0]['#markup'] ?></p>
    <p class="small text-color-light"><?php print t('IVA incluido') ?></p>
    
    <?php if ($node->disponibilidad == DISPONIBLE_LIBRERIA): ?>
      <p class="success"><?php print t('Disponible') ?></p>
    <?php elseif( $node->disponibilidad == DISPONIBLE_DISTRIBUIDOR): ?>
      <p class="text-warning"><?php print t('Disponible en') ?></p>
    <?php elseif($node->disponibilidad == NO_DISPONIBLE): ?>
      <p class="text-danger"> NO disponible</p>
    <?php endif; ?>
    <?php if ($node->disponibilidad == DISPONIBLE_LIBRERIA || $node->disponibilidad == DISPONIBLE_DISTRIBUIDOR): ?>
      <div class="mt-2">
        <button class="btn btn-primary btn-block">Comprar</button>
        <button class="btn btn-secondary btn-block">Añadir a la cesta</button>
      </div>
    <?php endif; ?>
  </div><!-- /buy -->
  <div class="description">
    <h1 class="hidden-xs"><?php print $node->title ?></h1>
    <p class="hidden-xs">
        De <?php print $content['autores'] ?>
    </p>
    <div class="mt-2">
        <table class="table table-condensed table-book">
            <tbody>
                <tr>
                    <th>ISBN</th>
                    <td><?php print $content['field_libro_isbn'][0]['#markup'] ?></td>
                </tr>
                <tr>
                    <th><?php print t('Páginas') ?></th>
                    <td><?php print $content['field_libro_paginas'][0]['#markup'] ?></td>
                </tr>
                <tr>
                    <th><?php print t('Año') ?></th>
                    <td><?php print $content['field_libro_year'][0]['#markup'] ?></td>
                </tr>
                <tr>
                    <th><?php print t('Editorial') ?></th>
                    <td><?php print $content['field_libro_editorial'][0]['#markup'] ?></td>
                </tr>
                <tr>
                    <th><?php print t('Sección') ?></th>
                    <td><?php $node->ubicacion ? print $node->ubicacion . ' / ': ''?><?php print l($content['field_libro_categoria']['#items'][0]['taxonomy_term']->name, 'taxonomy/term/'.$content['field_libro_categoria']['#items'][0]['tid']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>
         <?php print $node->sinopsis ?>
    </p>
    <?php if ($node->leer_mas): ?>
    <p>
      <a data-toggle="collapse" href="#collapse-sinopsis">Leer más</a>
    </p>
    <div class="collapse" id="collapse-sinopsis">
      <p>
        <?php print $node->leer_mas ?>
      </p>
    </div><!-- /posible collapse-->
    <?php endif; ?>
  </div><!-- /description -->
</div>