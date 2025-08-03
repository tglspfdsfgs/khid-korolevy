<?php

namespace App\Enums;

/** TODO: add casts to model
 * protected $casts = [
 *  'user' => Role::class,
 * ];.
 * */
enum Role: string
{
    /**
     * - Full access to all system functions
     * - Can manage other admins
     * - Used only for emergencies.
     */
    case super_admin = 'super_admin';

    /**
     * - Access to the admin panel
     * - User and content management
     * - No access to system settings.
     */
    case admin = 'admin';

    /**
     * - Content moderation (delete, edit)
     * - Ban users
     * - Usually no access to statistics and settings.
     */
    case moderator = 'moderator';

    /**
     * - Content creation and editing
     * - Cannot moderate other users.
     */
    case editor = 'editor';

    /**
     * - Extended rights (for example, creating posts with pre-moderation).
     */
    case contributor = 'contributor';

    /**
     * - Basic functions (personal account, comments)
     * - The most common role.
     */
    case user = 'user';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
