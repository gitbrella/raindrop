<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'BracketSpace\\Notification\\Abstracts\\Adapter' => $baseDir . '/src/classes/Abstracts/Adapter.php',
    'BracketSpace\\Notification\\Abstracts\\Carrier' => $baseDir . '/src/classes/Abstracts/Carrier.php',
    'BracketSpace\\Notification\\Abstracts\\Common' => $baseDir . '/src/classes/Abstracts/Common.php',
    'BracketSpace\\Notification\\Abstracts\\Field' => $baseDir . '/src/classes/Abstracts/Field.php',
    'BracketSpace\\Notification\\Abstracts\\MergeTag' => $baseDir . '/src/classes/Abstracts/MergeTag.php',
    'BracketSpace\\Notification\\Abstracts\\Notification' => $baseDir . '/src/includes/deprecated/class/Abstracts/Notification.php',
    'BracketSpace\\Notification\\Abstracts\\Recipient' => $baseDir . '/src/classes/Abstracts/Recipient.php',
    'BracketSpace\\Notification\\Abstracts\\Resolver' => $baseDir . '/src/classes/Abstracts/Resolver.php',
    'BracketSpace\\Notification\\Abstracts\\Store' => $baseDir . '/src/classes/Abstracts/Store.php',
    'BracketSpace\\Notification\\Abstracts\\Trigger' => $baseDir . '/src/classes/Abstracts/Trigger.php',
    'BracketSpace\\Notification\\Admin\\Debugging' => $baseDir . '/src/classes/Admin/Debugging.php',
    'BracketSpace\\Notification\\Admin\\Extensions' => $baseDir . '/src/classes/Admin/Extensions.php',
    'BracketSpace\\Notification\\Admin\\ImportExport' => $baseDir . '/src/classes/Admin/ImportExport.php',
    'BracketSpace\\Notification\\Admin\\NotificationDuplicator' => $baseDir . '/src/classes/Admin/NotificationDuplicator.php',
    'BracketSpace\\Notification\\Admin\\PostTable' => $baseDir . '/src/classes/Admin/PostTable.php',
    'BracketSpace\\Notification\\Admin\\PostType' => $baseDir . '/src/classes/Admin/PostType.php',
    'BracketSpace\\Notification\\Admin\\Screen' => $baseDir . '/src/classes/Admin/Screen.php',
    'BracketSpace\\Notification\\Admin\\Scripts' => $baseDir . '/src/classes/Admin/Scripts.php',
    'BracketSpace\\Notification\\Admin\\Settings' => $baseDir . '/src/classes/Admin/Settings.php',
    'BracketSpace\\Notification\\Admin\\Sync' => $baseDir . '/src/classes/Admin/Sync.php',
    'BracketSpace\\Notification\\Admin\\Wizard' => $baseDir . '/src/classes/Admin/Wizard.php',
    'BracketSpace\\Notification\\Api\\Api' => $baseDir . '/src/classes/Api/Api.php',
    'BracketSpace\\Notification\\Api\\Controller\\RepeaterController' => $baseDir . '/src/classes/Api/Controller/RepeaterController.php',
    'BracketSpace\\Notification\\Api\\Controller\\SectionRepeaterController' => $baseDir . '/src/classes/Api/Controller/SectionRepeaterController.php',
    'BracketSpace\\Notification\\Api\\Controller\\SelectInputController' => $baseDir . '/src/classes/Api/Controller/SelectInputController.php',
    'BracketSpace\\Notification\\Core\\Cache' => $baseDir . '/src/classes/Core/Cache.php',
    'BracketSpace\\Notification\\Core\\Cron' => $baseDir . '/src/classes/Core/Cron.php',
    'BracketSpace\\Notification\\Core\\Debugging' => $baseDir . '/src/classes/Core/Debugging.php',
    'BracketSpace\\Notification\\Core\\License' => $baseDir . '/src/classes/Core/License.php',
    'BracketSpace\\Notification\\Core\\Notification' => $baseDir . '/src/classes/Core/Notification.php',
    'BracketSpace\\Notification\\Core\\Resolver' => $baseDir . '/src/classes/Core/Resolver.php',
    'BracketSpace\\Notification\\Core\\Settings' => $baseDir . '/src/classes/Core/Settings.php',
    'BracketSpace\\Notification\\Core\\Sync' => $baseDir . '/src/classes/Core/Sync.php',
    'BracketSpace\\Notification\\Core\\Uninstall' => $baseDir . '/src/classes/Core/Uninstall.php',
    'BracketSpace\\Notification\\Core\\Upgrade' => $baseDir . '/src/classes/Core/Upgrade.php',
    'BracketSpace\\Notification\\Core\\Whitelabel' => $baseDir . '/src/classes/Core/Whitelabel.php',
    'BracketSpace\\Notification\\Defaults\\Adapter\\JSON' => $baseDir . '/src/classes/Defaults/Adapter/JSON.php',
    'BracketSpace\\Notification\\Defaults\\Adapter\\WordPress' => $baseDir . '/src/classes/Defaults/Adapter/WordPress.php',
    'BracketSpace\\Notification\\Defaults\\Carrier\\Email' => $baseDir . '/src/classes/Defaults/Carrier/Email.php',
    'BracketSpace\\Notification\\Defaults\\Carrier\\Webhook' => $baseDir . '/src/classes/Defaults/Carrier/Webhook.php',
    'BracketSpace\\Notification\\Defaults\\Carrier\\WebhookJson' => $baseDir . '/src/classes/Defaults/Carrier/WebhookJson.php',
    'BracketSpace\\Notification\\Defaults\\Field\\CheckboxField' => $baseDir . '/src/classes/Defaults/Field/CheckboxField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\CodeEditorField' => $baseDir . '/src/classes/Defaults/Field/CodeEditorField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\ColorPickerField' => $baseDir . '/src/classes/Defaults/Field/ColorPickerField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\EditorField' => $baseDir . '/src/classes/Defaults/Field/EditorField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\ImageField' => $baseDir . '/src/classes/Defaults/Field/ImageField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\InputField' => $baseDir . '/src/classes/Defaults/Field/InputField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\MessageField' => $baseDir . '/src/classes/Defaults/Field/MessageField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\NonceField' => $baseDir . '/src/classes/Defaults/Field/NonceField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\RecipientsField' => $baseDir . '/src/classes/Defaults/Field/RecipientsField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\RepeaterField' => $baseDir . '/src/classes/Defaults/Field/RepeaterField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\SectionRepeater' => $baseDir . '/src/classes/Defaults/Field/SectionRepeater.php',
    'BracketSpace\\Notification\\Defaults\\Field\\SectionsField' => $baseDir . '/src/classes/Defaults/Field/SectionsField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\SelectField' => $baseDir . '/src/classes/Defaults/Field/SelectField.php',
    'BracketSpace\\Notification\\Defaults\\Field\\TextareaField' => $baseDir . '/src/classes/Defaults/Field/TextareaField.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\BooleanTag' => $baseDir . '/src/classes/Defaults/MergeTag/BooleanTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentActionApprove' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentActionApprove.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentActionDelete' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentActionDelete.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentActionSpam' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentActionSpam.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentActionTrash' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentActionTrash.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentAuthorIP' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentAuthorIP.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentAuthorUrl' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentAuthorUrl.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentAuthorUserAgent' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentAuthorUserAgent.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentContent' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentContent.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentContentHtml' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentContentHtml.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentID' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentID.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentIsReply' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentIsReply.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentStatus' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentStatus.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Comment\\CommentType' => $baseDir . '/src/classes/Defaults/MergeTag/Comment/CommentType.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\DateTime\\Date' => $baseDir . '/src/classes/Defaults/MergeTag/DateTime/Date.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\DateTime\\DateTime' => $baseDir . '/src/classes/Defaults/MergeTag/DateTime/DateTime.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\DateTime\\Time' => $baseDir . '/src/classes/Defaults/MergeTag/DateTime/Time.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\EmailTag' => $baseDir . '/src/classes/Defaults/MergeTag/EmailTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\FloatTag' => $baseDir . '/src/classes/Defaults/MergeTag/FloatTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\HtmlTag' => $baseDir . '/src/classes/Defaults/MergeTag/HtmlTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\IPTag' => $baseDir . '/src/classes/Defaults/MergeTag/IPTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\IntegerTag' => $baseDir . '/src/classes/Defaults/MergeTag/IntegerTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Media\\AttachmentDirectUrl' => $baseDir . '/src/classes/Defaults/MergeTag/Media/AttachmentDirectUrl.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Media\\AttachmentID' => $baseDir . '/src/classes/Defaults/MergeTag/Media/AttachmentID.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Media\\AttachmentMimeType' => $baseDir . '/src/classes/Defaults/MergeTag/Media/AttachmentMimeType.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Media\\AttachmentPage' => $baseDir . '/src/classes/Defaults/MergeTag/Media/AttachmentPage.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Media\\AttachmentTitle' => $baseDir . '/src/classes/Defaults/MergeTag/Media/AttachmentTitle.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\FeaturedImageId' => $baseDir . '/src/classes/Defaults/MergeTag/Post/FeaturedImageId.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\FeaturedImageUrl' => $baseDir . '/src/classes/Defaults/MergeTag/Post/FeaturedImageUrl.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostContent' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostContent.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostContentHtml' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostContentHtml.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostExcerpt' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostExcerpt.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostID' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostID.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostPermalink' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostPermalink.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostSlug' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostSlug.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostStatus' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostStatus.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostTerms' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostTerms.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostTitle' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostTitle.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\PostType' => $baseDir . '/src/classes/Defaults/MergeTag/Post/PostType.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\RevisionLink' => $baseDir . '/src/classes/Defaults/MergeTag/Post/RevisionLink.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Post\\ThumbnailUrl' => $baseDir . '/src/classes/Defaults/MergeTag/Post/ThumbnailUrl.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\StringTag' => $baseDir . '/src/classes/Defaults/MergeTag/StringTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TaxonomyName' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TaxonomyName.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TaxonomySlug' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TaxonomySlug.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TermDescription' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TermDescription.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TermID' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TermID.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TermName' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TermName.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TermPermalink' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TermPermalink.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\Taxonomy\\TermSlug' => $baseDir . '/src/classes/Defaults/MergeTag/Taxonomy/TermSlug.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\UrlTag' => $baseDir . '/src/classes/Defaults/MergeTag/UrlTag.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\Avatar' => $baseDir . '/src/classes/Defaults/MergeTag/User/Avatar.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserBio' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserBio.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserDisplayName' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserDisplayName.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserEmail' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserEmail.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserFirstName' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserFirstName.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserID' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserID.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserLastName' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserLastName.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserLogin' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserLogin.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserNicename' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserNicename.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserPasswordResetLink' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserPasswordResetLink.php',
    'BracketSpace\\Notification\\Defaults\\MergeTag\\User\\UserRole' => $baseDir . '/src/classes/Defaults/MergeTag/User/UserRole.php',
    'BracketSpace\\Notification\\Defaults\\Notification\\Email' => $baseDir . '/src/includes/deprecated/class/Defaults/Notification/Email.php',
    'BracketSpace\\Notification\\Defaults\\Notification\\Webhook' => $baseDir . '/src/includes/deprecated/class/Defaults/Notification/Webhook.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\Administrator' => $baseDir . '/src/classes/Defaults/Recipient/Administrator.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\Email' => $baseDir . '/src/classes/Defaults/Recipient/Email.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\Role' => $baseDir . '/src/classes/Defaults/Recipient/Role.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\User' => $baseDir . '/src/classes/Defaults/Recipient/User.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\UserID' => $baseDir . '/src/classes/Defaults/Recipient/UserID.php',
    'BracketSpace\\Notification\\Defaults\\Recipient\\Webhook' => $baseDir . '/src/classes/Defaults/Recipient/Webhook.php',
    'BracketSpace\\Notification\\Defaults\\Resolver\\Basic' => $baseDir . '/src/classes/Defaults/Resolver/Basic.php',
    'BracketSpace\\Notification\\Defaults\\Store\\Carrier' => $baseDir . '/src/classes/Defaults/Store/Carrier.php',
    'BracketSpace\\Notification\\Defaults\\Store\\Notification' => $baseDir . '/src/classes/Defaults/Store/Notification.php',
    'BracketSpace\\Notification\\Defaults\\Store\\Recipient' => $baseDir . '/src/classes/Defaults/Store/Recipient.php',
    'BracketSpace\\Notification\\Defaults\\Store\\Resolver' => $baseDir . '/src/classes/Defaults/Store/Resolver.php',
    'BracketSpace\\Notification\\Defaults\\Store\\Trigger' => $baseDir . '/src/classes/Defaults/Store/Trigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentAdded' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentAdded.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentApproved' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentApproved.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentPublished' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentPublished.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentReplied' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentReplied.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentSpammed' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentSpammed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentTrashed' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentTrashed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Comment\\CommentUnapproved' => $baseDir . '/src/classes/Defaults/Trigger/Comment/CommentUnapproved.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Media\\MediaAdded' => $baseDir . '/src/classes/Defaults/Trigger/Media/MediaAdded.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Media\\MediaTrashed' => $baseDir . '/src/classes/Defaults/Trigger/Media/MediaTrashed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Media\\MediaTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Media/MediaTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Media\\MediaUpdated' => $baseDir . '/src/classes/Defaults/Trigger/Media/MediaUpdated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\Activated' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/Activated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\Deactivated' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/Deactivated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\Installed' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/Installed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\PluginTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/PluginTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\Removed' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/Removed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Plugin\\Updated' => $baseDir . '/src/classes/Defaults/Trigger/Plugin/Updated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostAdded' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostAdded.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostApproved' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostApproved.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostDrafted' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostDrafted.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostPending' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostPending.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostPublished' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostPublished.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostScheduled' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostScheduled.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostTrashed' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostTrashed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Post\\PostUpdated' => $baseDir . '/src/classes/Defaults/Trigger/Post/PostUpdated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Taxonomy\\TermAdded' => $baseDir . '/src/classes/Defaults/Trigger/Taxonomy/TermAdded.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Taxonomy\\TermDeleted' => $baseDir . '/src/classes/Defaults/Trigger/Taxonomy/TermDeleted.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Taxonomy\\TermTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Taxonomy/TermTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Taxonomy\\TermUpdated' => $baseDir . '/src/classes/Defaults/Trigger/Taxonomy/TermUpdated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Theme\\Installed' => $baseDir . '/src/classes/Defaults/Trigger/Theme/Installed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Theme\\Switched' => $baseDir . '/src/classes/Defaults/Trigger/Theme/Switched.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Theme\\ThemeTrigger' => $baseDir . '/src/classes/Defaults/Trigger/Theme/ThemeTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\Theme\\Updated' => $baseDir . '/src/classes/Defaults/Trigger/Theme/Updated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserDeleted' => $baseDir . '/src/classes/Defaults/Trigger/User/UserDeleted.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserLogin' => $baseDir . '/src/classes/Defaults/Trigger/User/UserLogin.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserLoginFailed' => $baseDir . '/src/classes/Defaults/Trigger/User/UserLoginFailed.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserLogout' => $baseDir . '/src/classes/Defaults/Trigger/User/UserLogout.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserPasswordChanged' => $baseDir . '/src/classes/Defaults/Trigger/User/UserPasswordChanged.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserPasswordResetRequest' => $baseDir . '/src/classes/Defaults/Trigger/User/UserPasswordResetRequest.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserProfileUpdated' => $baseDir . '/src/classes/Defaults/Trigger/User/UserProfileUpdated.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserRegistered' => $baseDir . '/src/classes/Defaults/Trigger/User/UserRegistered.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserRoleChanged' => $baseDir . '/src/classes/Defaults/Trigger/User/UserRoleChanged.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\User\\UserTrigger' => $baseDir . '/src/classes/Defaults/Trigger/User/UserTrigger.php',
    'BracketSpace\\Notification\\Defaults\\Trigger\\WordPress\\UpdatesAvailable' => $baseDir . '/src/classes/Defaults/Trigger/WordPress/UpdatesAvailable.php',
    'BracketSpace\\Notification\\Integration\\BackgroundProcessing' => $baseDir . '/src/classes/Integration/BackgroundProcessing.php',
    'BracketSpace\\Notification\\Integration\\CustomFields' => $baseDir . '/src/classes/Integration/CustomFields.php',
    'BracketSpace\\Notification\\Integration\\Gutenberg' => $baseDir . '/src/classes/Integration/Gutenberg.php',
    'BracketSpace\\Notification\\Integration\\TinyMce' => $baseDir . '/src/classes/Integration/TinyMce.php',
    'BracketSpace\\Notification\\Integration\\TwoFactor' => $baseDir . '/src/classes/Integration/TwoFactor.php',
    'BracketSpace\\Notification\\Integration\\WordPress' => $baseDir . '/src/classes/Integration/WordPress.php',
    'BracketSpace\\Notification\\Integration\\WordPressEmails' => $baseDir . '/src/classes/Integration/WordPressEmails.php',
    'BracketSpace\\Notification\\Interfaces\\Adaptable' => $baseDir . '/src/classes/Interfaces/Adaptable.php',
    'BracketSpace\\Notification\\Interfaces\\Fillable' => $baseDir . '/src/classes/Interfaces/Fillable.php',
    'BracketSpace\\Notification\\Interfaces\\Nameable' => $baseDir . '/src/classes/Interfaces/Nameable.php',
    'BracketSpace\\Notification\\Interfaces\\Receivable' => $baseDir . '/src/classes/Interfaces/Receivable.php',
    'BracketSpace\\Notification\\Interfaces\\Resolvable' => $baseDir . '/src/classes/Interfaces/Resolvable.php',
    'BracketSpace\\Notification\\Interfaces\\Sendable' => $baseDir . '/src/classes/Interfaces/Sendable.php',
    'BracketSpace\\Notification\\Interfaces\\Storable' => $baseDir . '/src/classes/Interfaces/Storable.php',
    'BracketSpace\\Notification\\Interfaces\\Taggable' => $baseDir . '/src/classes/Interfaces/Taggable.php',
    'BracketSpace\\Notification\\Interfaces\\Triggerable' => $baseDir . '/src/classes/Interfaces/Triggerable.php',
    'BracketSpace\\Notification\\Runtime' => $baseDir . '/src/classes/Runtime.php',
    'BracketSpace\\Notification\\Tests\\Carriers\\TestCarierStore' => $baseDir . '/tests/Carriers/TestCarierStore.php',
    'BracketSpace\\Notification\\Tests\\Core\\TestMain' => $baseDir . '/tests/Core/TestMain.php',
    'BracketSpace\\Notification\\Tests\\Core\\TestNotification' => $baseDir . '/tests/Core/TestNotification.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\NotificationPost' => $baseDir . '/tests/Helpers/NotificationPost.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Objects\\Carrier' => $baseDir . '/tests/Helpers/Objects/Carrier.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Objects\\PostponedTrigger' => $baseDir . '/tests/Helpers/Objects/PostponedTrigger.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Objects\\Recipient' => $baseDir . '/tests/Helpers/Objects/Recipient.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Objects\\Resolver' => $baseDir . '/tests/Helpers/Objects/Resolver.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Objects\\SimpleTrigger' => $baseDir . '/tests/Helpers/Objects/SimpleTrigger.php',
    'BracketSpace\\Notification\\Tests\\Helpers\\Registerer' => $baseDir . '/tests/Helpers/Registerer.php',
    'BracketSpace\\Notification\\Tests\\Notifications\\TestNotificationStore' => $baseDir . '/tests/Notifications/TestNotificationStore.php',
    'BracketSpace\\Notification\\Tests\\Recipient\\TestRecipientStore' => $baseDir . '/tests/Recipient/TestRecipientStore.php',
    'BracketSpace\\Notification\\Tests\\Resolvers\\TestResolverStore' => $baseDir . '/tests/Resolvers/TestResolverStore.php',
    'BracketSpace\\Notification\\Tests\\Triggers\\TestTrigger' => $baseDir . '/tests/Triggers/TestTrigger.php',
    'BracketSpace\\Notification\\Tests\\Triggers\\TestTriggerStore' => $baseDir . '/tests/Triggers/TestTriggerStore.php',
    'BracketSpace\\Notification\\Traits\\Cache' => $baseDir . '/src/classes/Traits/Cache.php',
    'BracketSpace\\Notification\\Traits\\Users' => $baseDir . '/src/classes/Traits/Users.php',
    'BracketSpace\\Notification\\Traits\\Webhook' => $baseDir . '/src/classes/Traits/Webhook.php',
    'BracketSpace\\Notification\\Utils\\Cache\\Cache' => $baseDir . '/src/classes/Utils/Cache/Cache.php',
    'BracketSpace\\Notification\\Utils\\Cache\\ObjectCache' => $baseDir . '/src/classes/Utils/Cache/ObjectCache.php',
    'BracketSpace\\Notification\\Utils\\Cache\\Transient' => $baseDir . '/src/classes/Utils/Cache/Transient.php',
    'BracketSpace\\Notification\\Utils\\EDDUpdater' => $baseDir . '/src/classes/Utils/EDDUpdater.php',
    'BracketSpace\\Notification\\Utils\\Interfaces\\Cacheable' => $baseDir . '/src/classes/Utils/Interfaces/Cacheable.php',
    'BracketSpace\\Notification\\Utils\\Settings' => $baseDir . '/src/classes/Utils/Settings.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Button' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Button.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Checkbox' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Checkbox.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Editor' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Editor.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Image' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Image.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Message' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Message.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Number' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Number.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Range' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Range.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Select' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Select.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Text' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Text.php',
    'BracketSpace\\Notification\\Utils\\Settings\\CoreFields\\Url' => $baseDir . '/src/classes/Utils/Settings/CoreFields/Url.php',
    'BracketSpace\\Notification\\Utils\\Settings\\Field' => $baseDir . '/src/classes/Utils/Settings/Field.php',
    'BracketSpace\\Notification\\Utils\\Settings\\Group' => $baseDir . '/src/classes/Utils/Settings/Group.php',
    'BracketSpace\\Notification\\Utils\\Settings\\Section' => $baseDir . '/src/classes/Utils/Settings/Section.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Ajax\\Response' => $vendorDir . '/micropackage/ajax/src/Response.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\DocHooks\\Helper' => $vendorDir . '/micropackage/dochooks/src/Helper.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\DocHooks\\Helper\\AnnotationTest' => $vendorDir . '/micropackage/dochooks/src/Helper/AnnotationTest.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\DocHooks\\HookAnnotations' => $vendorDir . '/micropackage/dochooks/src/HookAnnotations.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\DocHooks\\HookTrait' => $vendorDir . '/micropackage/dochooks/src/HookTrait.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Filesystem\\Filesystem' => $vendorDir . '/micropackage/filesystem/src/Filesystem.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Internationalization\\Internationalization' => $vendorDir . '/micropackage/internationalization/src/Internationalization.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Abstracts\\Checker' => $vendorDir . '/micropackage/requirements/src/Abstracts/Checker.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\DocHooks' => $vendorDir . '/micropackage/requirements/src/Checker/DocHooks.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\PHP' => $vendorDir . '/micropackage/requirements/src/Checker/PHP.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\PHPExtensions' => $vendorDir . '/micropackage/requirements/src/Checker/PHPExtensions.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\Plugins' => $vendorDir . '/micropackage/requirements/src/Checker/Plugins.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\Theme' => $vendorDir . '/micropackage/requirements/src/Checker/Theme.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Checker\\WP' => $vendorDir . '/micropackage/requirements/src/Checker/WP.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Interfaces\\Checkable' => $vendorDir . '/micropackage/requirements/src/Interfaces/Checkable.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Requirements\\Requirements' => $vendorDir . '/micropackage/requirements/src/Requirements.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Templates\\Exceptions\\StorageException' => $vendorDir . '/micropackage/templates/src/Exceptions/StorageException.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Templates\\Exceptions\\TemplateException' => $vendorDir . '/micropackage/templates/src/Exceptions/TemplateException.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Templates\\Storage' => $vendorDir . '/micropackage/templates/src/Storage.php',
    'BracketSpace\\Notification\\Vendor\\Micropackage\\Templates\\Template' => $vendorDir . '/micropackage/templates/src/Template.php',
    'TypistTech\\Imposter\\ArrayUtil' => $vendorDir . '/typisttech/imposter/src/ArrayUtil.php',
    'TypistTech\\Imposter\\Config' => $vendorDir . '/typisttech/imposter/src/Config.php',
    'TypistTech\\Imposter\\ConfigCollection' => $vendorDir . '/typisttech/imposter/src/ConfigCollection.php',
    'TypistTech\\Imposter\\ConfigCollectionFactory' => $vendorDir . '/typisttech/imposter/src/ConfigCollectionFactory.php',
    'TypistTech\\Imposter\\ConfigCollectionInterface' => $vendorDir . '/typisttech/imposter/src/ConfigCollectionInterface.php',
    'TypistTech\\Imposter\\ConfigFactory' => $vendorDir . '/typisttech/imposter/src/ConfigFactory.php',
    'TypistTech\\Imposter\\ConfigInterface' => $vendorDir . '/typisttech/imposter/src/ConfigInterface.php',
    'TypistTech\\Imposter\\Filesystem' => $vendorDir . '/typisttech/imposter/src/Filesystem.php',
    'TypistTech\\Imposter\\FilesystemInterface' => $vendorDir . '/typisttech/imposter/src/FilesystemInterface.php',
    'TypistTech\\Imposter\\Imposter' => $vendorDir . '/typisttech/imposter/src/Imposter.php',
    'TypistTech\\Imposter\\ImposterFactory' => $vendorDir . '/typisttech/imposter/src/ImposterFactory.php',
    'TypistTech\\Imposter\\ImposterInterface' => $vendorDir . '/typisttech/imposter/src/ImposterInterface.php',
    'TypistTech\\Imposter\\Plugin\\Capability\\CommandProvider' => $vendorDir . '/typisttech/imposter-plugin/src/Capability/CommandProvider.php',
    'TypistTech\\Imposter\\Plugin\\Command\\RunCommand' => $vendorDir . '/typisttech/imposter-plugin/src/Command/RunCommand.php',
    'TypistTech\\Imposter\\Plugin\\ImposterPlugin' => $vendorDir . '/typisttech/imposter-plugin/src/ImposterPlugin.php',
    'TypistTech\\Imposter\\ProjectConfig' => $vendorDir . '/typisttech/imposter/src/ProjectConfig.php',
    'TypistTech\\Imposter\\ProjectConfigInterface' => $vendorDir . '/typisttech/imposter/src/ProjectConfigInterface.php',
    'TypistTech\\Imposter\\StringUtil' => $vendorDir . '/typisttech/imposter/src/StringUtil.php',
    'TypistTech\\Imposter\\Transformer' => $vendorDir . '/typisttech/imposter/src/Transformer.php',
    'TypistTech\\Imposter\\TransformerInterface' => $vendorDir . '/typisttech/imposter/src/TransformerInterface.php',
);
