<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
  <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <div class="entry_content content"<?php print $content_attributes; ?>>
      <?php
      // We hide the comments and links now so that we can render them later.
      
      hide($content['comments']);
      hide($content['links']);
      //print render($content);
      ?>
      <div class="row-fluid">
        <div class="span12">
          <div class="visible-phone">
          <h1>
            <?php print $node->title ?>
          </h1>
          <h4><?php print $content['autores'] ?></h4>
          </div>
          <div class="row-fluid">
            <div class="span4">
               <?php print render($content['field_libro_portada']) ?>
            </div>
           <div class="span8">
            <div class="col-1 hidden-phone book-title-author">
              <div class="col_three_fourth <?php print isset($node->field_libro_subtitulo['und'][0]['value']) ? 'col_last': '' ?>">
                <h1>
                  <?php print $node->title ?>
                </h1>
              </div>
              <?php if ($node->field_libro_subtitulo['und'][0]['value']): ?>
                <div class="col_three_fourth">
                  <?php print render($content['field_libro_subtitulo']) ?>
                </div>
              <?php endif; ?>
              <div class="col_one_fourth col_last">
                <h5><?php print $content['autores'] ?></h5>
              </div>
            </div>
            <div class="clear"></div>
             <?php print render($content['sharethis']) ?>
             <div class="clear"></div>
            <div class="book-metadata">
            <div class="col-2 ">
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Precio') ?>
                </span>
                <span class="col-2 book-info-data book-price">
                    <?php print $content['product:commerce_price'][0]['#markup'] ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('ISBN') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print $content['field_libro_isbn'][0]['#markup'] ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Páginas') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print $content['field_libro_paginas'][0]['#markup'] ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Año') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print $content['field_libro_year'][0]['#markup'] ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Editorial') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print $content['field_libro_editorial'][0]['#markup'] ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Estado') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print isset($content['estado']) ? $content['estado'] :  t($content['field_libro_estado'][0]['#markup']) ?>
                </span>
              </div>
              <div class="book-info-entry">
                <span class="col-2 book-info-label">
                  <?php print t('Sección') ?>
                </span>
                <span class="col-2 book-info-data">
                    <?php print $content['field_libro_categoria'][0]['#markup'] ?>
                </span>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <?php print render($content['field_libro_sinopsis']) ?>
              </div>
              <?php if (user_access('access checkout', $user)): ?>
              <div class="span4">
                <?php print render($content['field_libro_producto']) ?>
              </div>
              <?php endif; ?>
            </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      

      <?php if ($page): print render($content['links']);
      endif;
      ?>
    </div>

  </div>