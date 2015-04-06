<div class="mask1">
                      <div class="actionss">
                       <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
                              <th><a href="/elips/users/index/page:1/sort:id_member/direction:asc">Id Member</a></th>
                              <th><a href="/elips/users/index/page:1/sort:username/direction:asc">Username</a></th>
                              <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Nama</a></th>
                              <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Lahir</a></th>
                              <th><a href="/elips/users/index/page:1/sort:telpon/direction:asc">Telpon</a></th>
                              <th>Group</th>
                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="usertable">

                            
                            <?php foreach($member as $user): ?>
                            <tr id="userentry_<?php echo $user['User']['id'] ?>"class="altrow ">

                              

                              <td>27</td>
                              <td><?php echo $user ['User']['id_member']?></td>
                              <td><?php echo $user ['User']['username'] ?></td>
                              <td><?php echo $user ['User']['name'] ?></td>
                              <td><?php echo $user ['User']['lahir'] ?></td>
                              <td><?php echo $user ['User']['telpon'] ?></td>
                              <td><?php echo $user ['User']['group'] ?></td>
                              <td class="actions">
                                <a href="<?php echo $this->webroot?>/Users/view/<?php echo $user ['User']['id'] ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a class="gotolinkanchor" href="<?php echo $this->webroot;?>users/edit/<?php echo $user['User']['id'] ?>" data-title="Edit Member" data-width="900px" data-height="500px"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="<?php echo $this->webroot;?>users/delete/<?php echo $user['User']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                            <?php endforeach?>
                          </tbody>
                        </table>
                        <div class="bottom_line1">&nbsp;</div>
                      </div>
                    </div>