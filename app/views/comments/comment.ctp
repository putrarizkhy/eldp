<div class="mask1">
                          <div class="actionss">
                           <table class="table hovered" cellpadding="0" cellspacing="0">
                              <thead>
                                <tr class="title_table">
                                  <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
                                  
                                  <th><a href="/elips/users/index/page:1/sort:username/direction:asc">Username</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Comment</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Status</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Created</a></th>
                                  <th class="actions">Actions</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $no = 0;?>
                                
                                <?php foreach($comment as $com):?> 
                                <?php
                                $no++;
                                ?>
                                <tr class="altrow ">
                                  <td><?php echo $no; ?></td>
                                  
                                  <td><?php echo $com['User']['username']?></td>
                                  <td><?php echo $com['Comment']['content'] ?></td>
                                  <td><?php echo $com['Comment']['status'] ?></td>
                                  <td><?php echo $com['Comment']['created'] ?></td>
                                  
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-thumbs-up on-right"></i> Setujui</a>
                                    <a href="<?php echo $this->webroot;?>users/delete/<?php echo $com['Comment']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <?php endforeach?>
                              </tbody>
                            </table>
                            <div class="bottom_line1">&nbsp;</div>
                          </div>
                        </div>