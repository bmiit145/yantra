@extends('layout.header')
@section('content')

@vite('resources/css/usercreat.css')
@section('title', 'Setting')
@section('image_url', 'images/Settings.png')
@section('navbar_menu')
    <li><a href="#">General Settings</a></li>
    <li><a href="#">Users & Companies</a></li>

@endsection

<section class="new_leads_section">
   <div class="container-full">
       <div class="new_leads_main_row">
           <div class="new_leads_main o_action_manager">
               <div class="new_leads_top">
                   <div class="new_leads_name">
                       <label class="d-block m-0"> Name </label>
                       <input type="text" class="new_leadform-control" placeholder="e.g. Product Pricing" aria-label="Recipient's username" aria-describedby="basic-addon2">
                   </div>
                   <div class="new_leads_name">
                       <label class="d-block m-0">Email? </label>
                       <input type="text" class="new_leadform-control" placeholder="e.g. email@yourcompany.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                   </div>
               </div>
               
               <ul class="new_litablist nav nav-tabs" id="myTab" role="tablist">
                   <li class="new_litablist-itam" role="presentation">
                   <button class="new_litablist-btn nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Access Rights</button>
                   </li>
                   <li class="new_litablist-itam" role="presentation">
                   <button class="new_litablist-btn nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Preferences</button>
                   </li>
               </ul>
               <div class="tab-contentextra-info tab-content" id="myTabContent">
                   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       <div class="form-floating">
                           <div class="o_group row align-items-start">
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Sales</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_50_51_52_0">Sales<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you handle your quotations, sale orders and invoicing.\n\nUser: Own Documents Only: the user will have access to his own data in the sales application.\nUser: All Documents: the user will have access to all records of everyone in the sales application.\nAdministrator: the user will have an access to the sales configuration as well as statistic reports.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_50_51_52" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_50_51_52_0">
                                              <option value="false" style=""></option>
                                              <option value="50">User: Own Documents Only</option>
                                              <option value="51">User: All Documents</option>
                                              <option value="52">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_104_105_0">Point of Sale<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you get the most out of your points of sale with fast sale encoding, simplified payment mode encoding, automatic picking lists generation and more.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_104_105" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_104_105_0">
                                              <option value="false" style=""></option>
                                              <option value="104">User</option>
                                              <option value="105">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_58_59_0">Sign<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you sign and complete your documents easily.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_58_59" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_58_59_0">
                                              <option value="false" style=""></option>
                                              <option value="58">User: Own Templates</option>
                                              <option value="59">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Services</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_55_56_0">Appointment</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_55_56" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_55_56_0">
                                              <option value="false" style=""></option>
                                              <option value="55">User</option>
                                              <option value="56">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_92_93_0">Field Service</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_92_93" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_92_93_0">
                                              <option value="false" style=""></option>
                                              <option value="92">User</option>
                                              <option value="93">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_64_65_0">Project</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_64_65" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_64_65_0">
                                              <option value="false" style=""></option>
                                              <option value="64">User</option>
                                              <option value="65">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_87_88_89_0">Timesheets</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_87_88_89" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_87_88_89_0">
                                              <option value="false" style=""></option>
                                              <option value="87">User: own timesheets only</option>
                                              <option value="88">User: all timesheets</option>
                                              <option value="89">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_97_98_0">Helpdesk</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_97_98" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_97_98_0">
                                              <option value="false" style=""></option>
                                              <option value="97">User</option>
                                              <option value="98">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Accounting</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_73_74_75_76_0">Accounting<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you handle your accounting needs, if you are not an accountant, we suggest you to install only the Invoicing.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_73_74_75_76" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_73_74_75_76_0">
                                              <option value="false" style=""></option>
                                              <option value="74">Billing</option>
                                              <option value="73">Read-only</option>
                                              <option value="75">Bookkeeper</option>
                                              <option value="76">Accountant</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_81_0">Bank</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_81" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_81_0">
                                              <option value="false" style=""></option>
                                              <option value="81">Validate bank account</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Inventory</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_25_26_0">Inventory<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your inventory and main stock operations: delivery orders, receptions, etc.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_25_26" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_25_26_0">
                                              <option value="false" style=""></option>
                                              <option value="25">User</option>
                                              <option value="26">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_116_117_0">Purchase<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your purchase-related processes such as requests for quotations, supplier bills, etc...\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_116_117" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_116_117_0">
                                              <option value="false" style=""></option>
                                              <option value="116">User</option>
                                              <option value="117">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Manufacturing</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_45_46_0">Quality<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your quality alerts and quality checks.\n\nUser: The quality user uses the quality process\nAdministrator: The quality manager manages the quality process&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_45_46" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_45_46_0">
                                              <option value="false" style=""></option>
                                              <option value="45">User</option>
                                              <option value="46">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_38_39_0">Manufacturing<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your manufacturing processes and generate reports on those processes.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_38_39" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_38_39_0">
                                              <option value="false" style=""></option>
                                              <option value="38">User</option>
                                              <option value="39">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Website</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_102_103_0">Live Chat<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;User: The user will be able to join support channels.\nAdministrator: The user will be able to delete support channels.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_102_103" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_102_103_0">
                                              <option value="false" style=""></option>
                                              <option value="102">User</option>
                                              <option value="103">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_95_96_0">eLearning</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_95_96" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_95_96_0">
                                              <option value="false" style=""></option>
                                              <option value="95">Officer</option>
                                              <option value="96">Manager</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_82_83_0">Website</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_82_83" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_82_83_0">
                                              <option value="false" style=""></option>
                                              <option value="82">Restricted Editor</option>
                                              <option value="83">Editor and Designer</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Marketing</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_53_54_0">Surveys<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your survey for review of different users.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_53_54" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_53_54_0">
                                              <option value="false" style=""></option>
                                              <option value="53">User</option>
                                              <option value="54">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Human Resources</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_62_63_0">Planning</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_62_63" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_62_63_0">
                                              <option value="false" style=""></option>
                                              <option value="62">User</option>
                                              <option value="63">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_20_21_0">Employees<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Officer: Manage all employees: The user will be able to approve document created by employees.\nAdministrator: The user will have access to the human resources configuration as well as statistic reports.&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_20_21" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_20_21_0">
                                              <option value="false" style=""></option>
                                              <option value="20">Officer: Manage all employees</option>
                                              <option value="21">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_124_125_126_0">Expenses<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;Helps you manage your expenses.\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_124_125_126" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_124_125_126_0">
                                              <option value="false" style=""></option>
                                              <option value="124">Team Approver</option>
                                              <option value="125">All Approver</option>
                                              <option value="126">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Productivity</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_113_114_0">Documents</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_113_114" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_113_114_0">
                                              <option value="false" style=""></option>
                                              <option value="113">User</option>
                                              <option value="114">Administrator</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Administration</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_2_4_0">Administration</label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_2_4" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_2_4_0">
                                              <option value="false" style=""></option>
                                              <option value="2">Access Rights</option>
                                              <option value="4">Settings</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div class="o_inner_group grid col-lg-6">
                                  <div class="g-col-sm-2">
                                     <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Other</div>
                                  </div>
                                  <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                     <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="sel_groups_22_0">Dashboard<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;User access level for Dashboard module\n&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                     <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                        <div name="sel_groups_22" class="o_field_widget o_field_selection">
                                           <select class="o_input pe-3" id="sel_groups_22_0">
                                              <option value="false" style=""></option>
                                              <option value="22">Admin</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                       </div>
                   </div>
                   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       <div class="o_group row align-items-start">
                           <div class="o_inner_group grid col-lg-6">
                              <div class="g-col-sm-2">
                                 <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Marketing</div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="company_id_1">Company</label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="company_id" class="o_field_widget o_field_many2one">
                                       <div class="o_field_many2one_selection">
                                          <div class="o_input_dropdown">
                                             <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="company_id_1" placeholder="" aria-expanded="false"></div>
                                             <span class="o_dropdown_button"></span>
                                          </div>
                                          <button type="button" class="btn btn-link text-action oi o_external_button oi-arrow-right" tabindex="-1" draggable="false" aria-label="Internal link" data-tooltip="Internal link"></button>
                                       </div>
                                       <div class="o_field_many2one_extra"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="campaign_id_0">Campaign<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is a name that helps you keep track of your different campaign efforts, e.g. Fall_Drive, Christmas_Special&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="campaign_id" class="o_field_widget o_field_many2one">
                                       <div class="o_field_many2one_selection">
                                          <div class="o_input_dropdown">
                                             <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="campaign_id_0" placeholder="" aria-expanded="false"></div>
                                             <span class="o_dropdown_button"></span>
                                          </div>
                                       </div>
                                       <div class="o_field_many2one_extra"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="medium_id_0">Medium<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the method of delivery, e.g. Postcard, Email, or Banner Ad&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="medium_id" class="o_field_widget o_field_many2one">
                                       <div class="o_field_many2one_selection">
                                          <div class="o_input_dropdown">
                                             <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="medium_id_0" placeholder="" aria-expanded="false"></div>
                                             <span class="o_dropdown_button"></span>
                                          </div>
                                       </div>
                                       <div class="o_field_many2one_extra"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="source_id_0">Source<sup class="text-info p-1" data-tooltip-template="web.FieldTooltip" data-tooltip-info="{&quot;field&quot;:{&quot;help&quot;:&quot;This is the source of the link, e.g. Search Engine, another domain, or name of email list&quot;}}" data-tooltip-touch-tap-to-show="true">?</sup></label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="source_id" class="o_field_widget o_field_many2one">
                                       <div class="o_field_many2one_selection">
                                          <div class="o_input_dropdown">
                                             <div class="o-autocomplete dropdown"><input type="text" class="o-autocomplete--input o_input" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" id="source_id_0" placeholder="" aria-expanded="false"></div>
                                             <span class="o_dropdown_button"></span>
                                          </div>
                                       </div>
                                       <div class="o_field_many2one_extra"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0" for="referred_0">Referred By</label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="referred" class="o_field_widget o_field_char"><input class="o_input" id="referred_0" type="text" autocomplete="off"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="o_inner_group grid col-lg-6">
                              <div class="g-col-sm-2">
                                 <div class="o_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">Analysis</div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0 o_form_label_readonly m-0" for="date_open_0">Assignment Date</label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="date_open" class="o_field_widget o_readonly_modifier o_field_datetime">
                                       <div class="d-flex gap-2 align-items-center"><span class="text-truncate">07/09/2024 12:06:28</span></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="o_wrap_field d-flex d-sm-contents mb-3 mb-sm-0">
                                 <div class="o_cell w-25 o_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900"><label class="o_form_label m-0 o_form_label_readonly m-0" for="date_closed_0">Closed Date</label></div>
                                 <div class="o_cell o_wrap_input flex-grow-1 flex-sm-grow-0 text-break" style="width: 100%;">
                                    <div name="date_closed" class="o_field_widget o_readonly_modifier o_field_datetime">
                                       <div class="d-flex gap-2 align-items-center"><span class="text-truncate"></span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                   </div>
               </div>
           </div>
      
       </div>
   </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

@endsection
