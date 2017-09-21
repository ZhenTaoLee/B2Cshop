/*
 * uuid_time.c --- Interpret the time field from a uuid.  This program
 * 	violates the UUID abstraction barrier by reaching into the guts
 *	of a UUID and interpreting it.
 *
 * Copyright (C) 1998, 1999 Theodore Ts'o.
 *
 * %Begin-Header%
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, and the entire permission notice in its entirety,
 *    including the disclaimer of warranties.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. The name of the author may not be used to endorse or promote
 *    products derived from this software without specific prior
 *    written permission.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE, ALL OF
 * WHICH ARE HEREBY DISCLAIMED.  IN NO EVENT SHALL THE AUTHOR BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT
 * OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
 * BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE
 * USE OF THIS SOFTWARE, EVEN IF NOT ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 * %End-Header%
 */

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#ifdef _WIN32
#define _WIN32_WINNT 0x0500
#include <windows.h>
#define UUID MYUUID
#endif

#include <stdio.h>
#include "uuid.h"

static const char *variant_string(int variant)
{
	switch (variant) {
	case UUID_VARIANT_NCS:
		return "NCS";
	case UUID_VARIANT_DCE:
		return "DCE";
	case UUID_VARIANT_MICROSOFT:
		return "Microsoft";
	default:
		return "Other";
	}
}


int
main(int argc, char **argv)
{
	uuid_t		buf;
	time_t		time_reg;
	struct timeval	tv;
	int		type, variant;

	if (argc != 2) {
		fprintf(stderr, "Usage: %s uuid\n", argv[0]);
		exit(1);
	}
	if (uuid_parse(argv[1], buf)) {
		fprintf(stderr, "Invalid UUID: %s\n", argv[1]);
		exit(1);
	}
	variant = uuid_variant(buf);
	type = uuid_type(buf);
	time_reg = uuid_time(buf, &tv);

	printf("UUID variant is %d (%s)\n", variant, variant_string(variant));
	if (variant != UUID_VARIANT_DCE) {
		printf("Warning: This program only knows how to interpret "
		       "DCE UUIDs.\n\tThe rest of the output is likely "
		       "to be incorrect!!\n");
	}
	printf("UUID type is %d", type);
	switch (type) {
	case 1:
		printf(" (time based)\n");
		break;
	case 2:
		printf(" (DCE)\n");
		break;
	case 3:
		printf(" (name-based)\n");
		break;
	case 4:
		printf(" (random)\n");
		break;
	default:
		printf("\n");
	}
	if (type != 1) {
		printf("Warning: not a time-based UUID, so UUID time "
		       "decoding will likely not work!\n");
	}
	printf("UUID time is: (%ld, %ld): %s\n", tv.tv_sec, tv.tv_usec,
	       ctime(&time_reg));

	return 0;
}

